<?php

use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
     return view('welcome');
 });


 // Controller TestController
use App\Http\Controllers\TestController;
Route::get('/', [TestController::class, 'index']);