<?php

//use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');
//
//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');
//
//Route::view('profile', 'profile')
//    ->middleware(['auth'])
//    ->name('profile');

require __DIR__.'/auth.php';


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegesController;
use Livewire\Volt\Volt;


// Page d'accueil
Route::get('/', function () {
    return view('accueil'); // ou 'welcome' si tu préfères
})->name('home');

// Afficher le formulaire pour ajouter un collège
Route::get('/colleges/create', [CollegesController::class, 'createForm'])
    ->name('colleges.form');

// Enregistrer un nouveau collège
Route::post('/colleges/create', [CollegesController::class, 'createCollege'])
    ->name('colleges.create');

// Liste des collèges
Route::get('/colleges/liste', [CollegesController::class, 'listColleges'])
    ->name('colleges.list');

Route::delete('/colleges/{id}/supprimer', [CollegesController::class, 'destroy'])
    ->name('colleges.destroy');

Route::get('/colleges/supprimer', [CollegesController::class, 'deletePage'])
    ->name('colleges.deletePage');

// Afficher le formulaire d'édition d'un collège
Route::get('/colleges/{id}/edit', [CollegesController::class, 'edit'])->name('colleges.edit');

// Mettre à jour le collège dans la base de données
Route::put('/colleges/{id}', [CollegesController::class, 'update'])->name('colleges.update');

// Connexion
Volt::route('login', 'pages.auth.login')->name('login');
Volt::route('register', 'pages.auth.register')->name('register');
Volt::route('logout', 'pages.auth.logout')->name('logout');


Route::resource('users', UserController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';