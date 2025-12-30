<?php
// app/Http/Controllers/Admin/EvenementAdminController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EvenementAdminController extends Controller
{
    public function index()
    {
        $evenements = Evenement::orderBy('date_debut', 'desc')->get();

        return Inertia::render('Admin/Evenements/Index', [
            'evenements' => $evenements
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Evenements/Create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'lieu' => 'required|string|max:255',
            'image_url' => 'nullable|url',
            'est_actif' => 'boolean'
        ]);

        Evenement::create($validated);

        return redirect()->route('admin.evenements.index')
            ->with('success', 'Événement créé avec succès');
    }

    public function show(Evenement $evenement)
    {
        return Inertia::render('Admin/Evenements/Show', [
            'evenement' => $evenement
        ]);
    }

    public function edit(Evenement $evenement)
    {
        return Inertia::render('Admin/Evenements/Edit', [
            'evenement' => $evenement
        ]);
    }

   public function update(Request $request, Evenement $evenement)
{
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => 'nullable|date|after_or_equal:date_debut',
        'lieu' => 'required|string|max:255',
        'image_url' => 'nullable|url',
        'est_actif' => 'boolean'
    ]);

    $evenement->update($validated);

    return redirect()->route('admin.evenements.index')
        ->with('success', 'Événement modifié avec succès');
}

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();

        return redirect()->route('admin.evenements.index')
            ->with('success', 'Événement supprimé avec succès');
    }
}
