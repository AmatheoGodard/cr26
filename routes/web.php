<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegesController;

// Page d'accueil
Route::get('/', function () {
    return view('views_college'); // ou 'welcome' si tu préfères
})->name('home');

// Afficher le formulaire pour ajouter un collège
Route::get('/colleges/create', [CollegesController::class, 'createForm'])
    ->name('colleges.form');

// Enregistrer un nouveau collège
Route::post('/colleges', [CollegesController::class, 'createCollege'])
    ->name('colleges.create');

// Liste des collèges
Route::get('/colleges/liste', [CollegesController::class, 'listColleges'])
    ->name('colleges.list');

// Page pour supprimer un collège
Route::get('/colleges/supprimer', [CollegesController::class, 'deletePage'])
    ->name('colleges.deletePage');

// Supprimer un collège
Route::delete('/colleges/{id}', [CollegesController::class, 'destroy'])
    ->name('colleges.destroy');

// Afficher le formulaire d'édition d'un collège
Route::get('/colleges/{id}/edit', [CollegesController::class, 'edit'])->name('colleges.edit');

// Mettre à jour le collège dans la base de données
Route::put('/colleges/{id}', [CollegesController::class, 'update'])->name('colleges.update');
