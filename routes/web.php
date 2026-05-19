<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CollegesController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConcoursController;

use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ======================
// PAGE D'ACCUEIL
// ======================

Route::get('/', function () {
    return view('accueil');
})->name('home');


// ======================
// ROUTES COLLEGES
// ======================

// Formulaire ajout
Route::get('/colleges/create', [CollegesController::class, 'createForm'])
    ->name('colleges.form');

// Création
Route::post('/colleges/create', [CollegesController::class, 'createCollege'])
    ->name('colleges.create');

// Liste
Route::get('/colleges/liste', [CollegesController::class, 'listColleges'])
    ->name('colleges.list');

// Page suppression
Route::get('/colleges/supprimer', [CollegesController::class, 'deletePage'])
    ->name('colleges.deletePage');

// Suppression
Route::delete('/colleges/{id}/supprimer', [CollegesController::class, 'destroy'])
    ->name('colleges.destroy');

// Formulaire édition
Route::get('/colleges/{id}/edit', [CollegesController::class, 'edit'])
    ->name('colleges.edit');

// Mise à jour
Route::put('/colleges/{id}', [CollegesController::class, 'update'])
    ->name('colleges.update');


// ======================
// ROUTES PAYS
// ======================

// Les URLs simples (sans accolades) TOUJOURS EN PREMIER :
Route::get('/pays/create', [PaysController::class, 'createForm'])->name('pays.form');
Route::post('/pays/create', [PaysController::class, 'createPays'])->name('pays.create');
Route::get('/pays/liste', [PaysController::class, 'listPays'])->name('pays.list');
Route::get('/pays/supprimer', [PaysController::class, 'deletePage'])->name('pays.deletePage');

// Les URLs avec des variables {code} TOUJOURS EN DERNIER :
Route::delete('/pays/{code}/supprimer', [PaysController::class, 'destroy'])->name('pays.destroy');
Route::get('/pays/{code}/edit', [PaysController::class, 'edit'])->name('pays.edit');
Route::put('/pays/{code}', [PaysController::class, 'update'])->name('pays.update');


// ======================
// ROUTES CONCOURS
// ======================

Route::middleware(['auth'])->group(function () {
    Route::get('/concours', [ConcoursController::class, 'index'])->name('concours.index');
    Route::get('/concours/creer', [ConcoursController::class, 'create'])->name('concours.create');
    Route::post('/concours/enregistrer', [ConcoursController::class, 'store'])->name('concours.store');
});

// ======================
// AUTHENTIFICATION
// ======================

Volt::route('login', 'pages.auth.login')->name('login');

Volt::route('register', 'pages.auth.register')->name('register');

Volt::route('logout', 'pages.auth.logout')->name('logout');


// ======================
// USERS
// ======================

Route::resource('users', UserController::class);


// ======================
// DASHBOARD
// ======================

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// ======================
// PROFILE
// ======================

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// ======================
// AUTH
// ======================

require __DIR__.'/auth.php';