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
});

Route ::get('/colleges/liste', function () {
    return view('listeCollege');
}); 