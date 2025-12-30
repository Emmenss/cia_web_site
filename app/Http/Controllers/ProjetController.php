<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Inertia\Inertia;

class ProjetController extends Controller
{
    /**
     * Affiche la liste des projets
     */
   public function index()
{
    $projetsRecherche = Projet::where('categorie', '!=', 'Éducation')
        ->whereIn('categorie', ['Recherche', 'Santé', 'Agriculture', 'NLP', 'Vision par Ordinateur', 'Robotique'])
        ->orderBy('created_at', 'desc')
        ->get();

    $ressourcesEducatives = Projet::where('categorie', 'Éducation')
        ->orderBy('created_at', 'desc')
        ->get();

    $projetsCulturels = Projet::where('categorie', 'Culturel')
        ->orderBy('created_at', 'desc')
        ->get();

    return Inertia::render('Realisations', [
        'projetsRecherche' => $projetsRecherche,
        'ressourcesEducatives' => $ressourcesEducatives,
        'projetsCulturels' => $projetsCulturels,
        'recompenses' => [] // À adapter selon vos besoins
    ]);
}
}
