<?php
// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use App\Models\CarouselSlide;
use App\Models\MeilleureRealisation;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les slides actifs du carousel
        $carouselSlides = CarouselSlide::where('est_actif', true)
            ->orderBy('ordre')
            ->get()
            ->map(function ($slide) {
                return [
                    'caption' => $slide->titre,
                    'description' => $slide->description,
                    'image_url' => $slide->image_url // Ajouté pour l'image
                ];
            });

        // Récupérer la meilleure réalisation active
        $bestAchievement = MeilleureRealisation::where('est_actif', true)
            ->first();

        // Données statiques (comme avant)
        $stats = [
            ['value' => '50+', 'label' => 'Projets Innovants'],
            ['value' => '200+', 'label' => 'Membres Actifs'],
            ['value' => '15+', 'label' => 'Partenariats'],
            ['value' => '98%', 'label' => 'Satisfaction']
        ];

        $executiveMembers = [
            [
                'name' => 'Dr. Jean Dupont',
                'position' => 'Président',
                'bio' => 'Expert en Machine Learning avec 8 ans d\'expérience dans le domaine de l\'IA.'
            ],
            // ... autres membres
        ];

        $president = ['name' => 'Dr. Jean Dupont'];

        return Inertia::render('Home', [
            'carouselSlides' => $carouselSlides,
            'bestAchievement' => $bestAchievement ? [
                'title' => $bestAchievement->titre,
                'category' => $bestAchievement->categorie,
                'description' => $bestAchievement->description,
                'image_url' => $bestAchievement->image_url,
                'link' => $bestAchievement->lien
            ] : null,
            'stats' => $stats,
            'executiveMembers' => $executiveMembers,
            'president' => $president
        ]);
    }
}
