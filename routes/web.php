<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\AdminActualiteController;
//use App\Http\Controllers\AdminEvenementController;
//use App\Http\Controllers\AdminProjetController;
use App\Http\Controllers\Admin\ContributionAdminController;
use App\Http\Controllers\Admin\ActualiteAdminController;
use App\Http\Controllers\Admin\EvenementAdminController;
use App\Http\Controllers\Admin\ProjetAdminController;
use App\Http\Controllers\HomeController;

use Inertia\Inertia;

// Pages principales
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/espace-etudiant', function () {
    return Inertia::render('EspaceEtudiant');
})->name('espace-etudiant');

// Routes avec contrôleurs
Route::get('/actualite', [ActualiteController::class, 'index'])->name('actualite');
Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements');
Route::post('/evenements/{id}/inscrire', [EvenementController::class, 'inscrire'])->name('evenements.inscrire');

Route::get('/realisations', [ProjetController::class, 'index'])->name('realisations');

Route::get('/collecte-donnees', [ContributionController::class, 'create'])->name('collecte-donnees');
Route::post('/contributions', [ContributionController::class, 'store'])->name('contributions.store');
Route::get('/resultats-analyse', [ContributionController::class, 'statistiques'])->name('resultats-analyse');
Route::get('/contributions/{id}/download', [ContributionController::class, 'download'])->name('contributions.download');

// Pages statiques
Route::get('/objectifs', function () {
    return Inertia::render('Objectifs');
})->name('objectifs');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

// Routes admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Routes CRUD
    //Route::resource('/actualites', AdminActualiteController::class);
    //Route::resource('/evenements', AdminEvenementController::class);
    //Route::resource('/projets', AdminProjetController::class);

    // Routes contributions admin
    Route::get('/contributions', [ContributionAdminController::class, 'index'])->name('contributions.index');
    Route::get('/contributions/{contribution}', [ContributionAdminController::class, 'show'])->name('contributions.show');
    Route::post('/contributions/{contribution}/approve', [ContributionAdminController::class, 'approve'])->name('contributions.approve');
    Route::post('/contributions/{contribution}/reject', [ContributionAdminController::class, 'reject'])->name('contributions.reject');
    Route::get('/contributions/{contribution}/download', [ContributionAdminController::class, 'download'])->name('contributions.download');

    //ROUTES POUR ACTUALITES
    Route::resource('actualites', ActualiteAdminController::class);

    //EVENEMENTS
     Route::resource('evenements', EvenementAdminController::class);

     Route::resource('projets', ProjetAdminController::class);
});




//
// Routes carousel
// routes/web.php
Route::resource('admin/carousel', \App\Http\Controllers\Admin\CarouselController::class)
    ->names('admin.carousel');

Route::get('admin/meilleure-realisation/edit', [\App\Http\Controllers\Admin\MeilleureRealisationController::class, 'edit'])
    ->name('admin.meilleure-realisation.edit');
Route::put('admin/meilleure-realisation', [\App\Http\Controllers\Admin\MeilleureRealisationController::class, 'update'])
    ->name('admin.meilleure-realisation.update');
// Route fallback pour SPA
Route::fallback(function () {
    return Inertia::render('Home');
});
