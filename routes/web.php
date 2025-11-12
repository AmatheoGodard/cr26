<?php

use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
     return view('views_college');
 });


//  // Controller TestController
// use App\Http\Controllers\TestController;
// Route::get('/', [TestController::class, 'index']);

// Controller CollegesController
use App\Http\Controllers\CollegesController;
Route::get('/colleges/create', function () {
    return view('addCollege');
})->name('colleges.form');
Route::post('/colleges', [CollegesController::class, 'createCollege'])->name('colleges.create');     


Route::get('/colleges/liste', [CollegesController::class, 'listColleges'])
    ->name('colleges.list');

Route::post('/colleges', [CollegesController::class, 'createCollege'])
    ->name('colleges.create');
