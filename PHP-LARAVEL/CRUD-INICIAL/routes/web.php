<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;



Route::get('/', function () {
return view('welcome');
});

Route::resource('filmes', FilmesController::class);