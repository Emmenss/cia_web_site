<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContributionController extends Controller
{
    /**
     * Affiche le formulaire de contribution
     */
    public function create()
    {
        return Inertia::render('CollecteDonnees');
    }

    /**
     * Stocke une nouvelle contribution
     */
    public function store(Request $request)
    {
        \Log::info('Données reçues:', $request->all());
        \Log::info('Fichiers reçus:', $request->allFiles());

        try {
            // Validation basique
            $validator = Validator::make($request->all(), [
                'type' => 'required|in:image,texte,dataset',
                'titre' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Validation spécifique selon le type
            $rules = $this->getValidationRules($request->type);
            $validatedData = $request->validate($rules);

            // Traitement des fichiers uploadés
            $fileData = $this->handleFileUpload($request, $validatedData['type']);

            // Données de base
            $contributionData = [
                'user_id' => Auth::check() ? Auth::id() : null,
                'type' => $validatedData['type'],
                'titre' => $validatedData['titre'],
                'statut' => 'en_attente',
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ];

            // Données spécifiques au type
            $typeSpecificData = [];
            switch ($validatedData['type']) {
                case 'image':
                    $typeSpecificData = [
                        'nature' => $validatedData['nature'],
                        'description' => $validatedData['description'],
                    ];
                    break;

                case 'texte':
                    $typeSpecificData = [
                        'thematique' => $validatedData['thematique'],
                        'langue' => $validatedData['langue'],
                        'contenu_texte' => $validatedData['contenu_texte'],
                    ];
                    break;

                case 'dataset':
                    $typeSpecificData = [
                        'domaine' => $validatedData['domaine'],
                        'description' => $validatedData['description'],
                    ];
                    break;
            }

            // Création de la contribution
            Contribution::create(array_merge(
                $contributionData,
                $typeSpecificData,
                $fileData
            ));

            return response()->json([
                'success' => true,
                'message' => 'Merci pour votre contribution ! Elle sera examinée par notre équipe.'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Erreur création contribution: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Règles de validation spécifiques par type
     */
    private function getValidationRules($type)
    {
        $baseRules = [
            'type' => 'required|in:image,texte,dataset',
            'titre' => 'required|string|max:255',
        ];

        $typeRules = match($type) {
            'image' => [
                'nature' => 'required|in:portrait,medical,agriculture,elevage,culture,urbain,nature',
                'description' => 'required|string|min:10|max:1000',
                'images' => 'required|array|min:1|max:10',
                'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:10240',
            ],
            'texte' => [
                'thematique' => 'required|in:contes,traditions,histoire,savoir,quotidien,autre',
                'langue' => 'required|in:français,anglais,ewondo,dual,bassa,autre',
                'contenu_texte' => 'required|string|min:1|max:1000000000',
            ],
            'dataset' => [
                'domaine' => 'required|in:sante,agriculture,elevage,environnement,education,economie,transport,autre',
                'description' => 'required|string|min:1|max:2000',
                'fichier_dataset' => 'required|file|mimes:csv,txt,xlsx,xls,json|max:51200',
            ],
            default => []
        };

        return array_merge($baseRules, $typeRules);
    }

    /**
     * Gestion de l'upload des fichiers
     */
    private function handleFileUpload(Request $request, $type)
    {
        $fileData = [];

        try {
            switch ($type) {
                case 'image':
                    if ($request->hasFile('images')) {
                        $imagePaths = [];
                        foreach ($request->file('images') as $image) {
                            $path = $image->store('contributions/images', 'public');
                            $imagePaths[] = $path;
                        }
                        $fileData['chemin_fichier'] = json_encode($imagePaths);
                        $fileData['nom_fichier'] = count($imagePaths) . ' images';
                    }
                    break;

                case 'dataset':
                    if ($request->hasFile('fichier_dataset')) {
                        $file = $request->file('fichier_dataset');
                        $path = $file->store('contributions/datasets', 'public');
                        $fileData['chemin_fichier'] = $path;
                        $fileData['nom_fichier'] = $file->getClientOriginalName();
                    }
                    break;
            }
        } catch (\Exception $e) {
            \Log::error('Erreur upload fichier: ' . $e->getMessage());
            throw new \Exception('Erreur lors de l\'upload des fichiers: ' . $e->getMessage());
        }

        return $fileData;
    }

    /**
     * Téléchargement d'un fichier de contribution
     */
    public function download($id): StreamedResponse
    {
        $contribution = Contribution::findOrFail($id);

        if (!$contribution->chemin_fichier) {
            abort(404, 'Fichier non trouvé');
        }

        if (!Auth::check()) {
            abort(403, 'Accès non autorisé');
        }

        $filePath = $contribution->chemin_fichier;

        if ($contribution->type === 'image' && is_array(json_decode($filePath, true))) {
            $paths = json_decode($filePath, true);
            $filePath = $paths[0] ?? null;

            if (!$filePath) {
                abort(404, 'Fichier non trouvé');
            }
        }

        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'Fichier non trouvé sur le serveur');
        }

        return Storage::disk('public')->download($filePath);
    }

    /**
     * Affiche les statistiques des contributions
     */
    public function statistiques()
    {
        $stats = [
            'total' => Contribution::count(),
            'par_type' => Contribution::groupBy('type')
                ->selectRaw('type, count(*) as total')
                ->get(),
            'par_statut' => Contribution::groupBy('statut')
                ->selectRaw('statut, count(*) as total')
                ->get(),
        ];

        return Inertia::render('ResultatsAnalyse', [
            'statistiques' => $stats
        ]);
    }
}
