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
// PAGES PUBLIQUES
// ======================

Route::get('/', function () {
    return view('accueil');
})->name('home');


// ======================
// ROUTES COLLEGES
// ======================

Route::prefix('colleges')->name('colleges.')->group(function () {
    Route::get('/liste', [CollegesController::class, 'listColleges'])->name('list');
    Route::get('/create', [CollegesController::class, 'createForm'])->name('form');
    Route::post('/create', [CollegesController::class, 'createCollege'])->name('create');
    Route::get('/supprimer', [CollegesController::class, 'deletePage'])->name('deletePage');

    // Routes avec paramètres (toujours en bas)
    Route::get('/{id}/edit', [CollegesController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CollegesController::class, 'update'])->name('update');
    Route::delete('/{id}/supprimer', [CollegesController::class, 'destroy'])->name('destroy');
});


// ======================
// ROUTES PAYS
// ======================

Route::prefix('pays')->name('pays.')->group(function () {
    Route::get('/liste', [PaysController::class, 'listPays'])->name('list');
    Route::get('/create', [PaysController::class, 'createForm'])->name('form');
    Route::post('/create', [PaysController::class, 'createPays'])->name('create');
    Route::get('/supprimer', [PaysController::class, 'deletePage'])->name('deletePage');

    // Routes avec paramètres (toujours en bas)
    Route::get('/{code}/edit', [PaysController::class, 'edit'])->name('edit');
    Route::put('/{code}', [PaysController::class, 'update'])->name('update');
    Route::delete('/{code}/supprimer', [PaysController::class, 'destroy'])->name('destroy');
});


// ======================
// ESPACE SÉCURISÉ (AUTH)
// ======================

Route::middleware(['auth'])->group(function () {

    // Dashboard / Accueil connecté
    Route::view('/dashboard', 'accueil')->name('dashboard');
    
    // Profile
    Route::view('/profile', 'profile')->name('profile');

    // Concours
    Route::prefix('concours')->name('concours.')->group(function () {
        Route::get('/', [ConcoursController::class, 'index'])->name('index');
        Route::get('/creer', [ConcoursController::class, 'create'])->name('create');
        Route::post('/enregistrer', [ConcoursController::class, 'store'])->name('store');
    });

    // Utilisateurs (CRUD complet via Resource)
    Route::resource('users', UserController::class);
});


// ======================
// AUTHENTIFICATION (LIVEWIRE VOLT)
// ======================

Volt::route('login', 'pages.auth.login')->name('login');
Volt::route('register', 'pages.auth.register')->name('register');
Volt::route('logout', 'pages.auth.logout')->name('logout');


// CORRECTION : Commenter cette ligne pour éviter les conflits de middleware (guest vs auth)
// require __DIR__.'/auth.php';