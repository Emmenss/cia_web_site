<?php
// app/Http/Controllers/Admin/ProjetAdminController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjetAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::orderBy('created_at', 'desc')->get();

        return Inertia::render('Admin/Projets/Index', [
            'projets' => $projets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Projets/Create', [
            'categories' => $this->getCategories(),
            'statuts' => $this->getStatuts()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|in:Recherche,Éducation,Culturel,Santé,Agriculture,NLP,Vision par Ordinateur,Robotique',
            'equipe' => 'nullable|string|max:255',
            'statut' => 'required|in:Terminé,En cours,Planifié',
            'lien_demo' => 'nullable|url',
            'lien_github' => 'nullable|url',
            'image_url' => 'nullable|url',
            'lien_telechargement' => 'nullable|url',
            'lien_decouvrir' => 'nullable|url',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut'
        ]);

        Projet::create($validated);

        return redirect()->route('admin.projets.index')
            ->with('success', 'Projet créé avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        return Inertia::render('Admin/Projets/Edit', [
            'projet' => $projet,
            'categories' => $this->getCategories(),
            'statuts' => $this->getStatuts()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|in:Recherche,Éducation,Culturel,Santé,Agriculture,NLP,Vision par Ordinateur,Robotique',
            'equipe' => 'nullable|string|max:255',
            'statut' => 'required|in:Terminé,En cours,Planifié',
            'lien_demo' => 'nullable|url',
            'lien_github' => 'nullable|url',
            'image_url' => 'nullable|url',
            'lien_telechargement' => 'nullable|url',
            'lien_decouvrir' => 'nullable|url',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut'
        ]);

        $projet->update($validated);

        return redirect()->route('admin.projets.index')
            ->with('success', 'Projet modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        $projet->delete();

        return redirect()->route('admin.projets.index')
            ->with('success', 'Projet supprimé avec succès');
    }

    /**
     * Get available categories
     */
    private function getCategories()
    {
        return [
            'Recherche',
            'Éducation',
            'Culturel',
            'Santé',
            'Agriculture',
            'NLP',
            'Vision par Ordinateur',
            'Robotique'
        ];
    }

    /**
     * Get available statuses
     */
    private function getStatuts()
    {
        return ['Terminé', 'En cours', 'Planifié'];
    }
}
