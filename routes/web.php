<?php

use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
     return view('addCollege');
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
