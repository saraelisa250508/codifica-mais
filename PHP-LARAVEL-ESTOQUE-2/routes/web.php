<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;



Route::get('/', function () {
    return view('welcome');
});



//rota de produtos
Route::resource('produtos', ProdutoController::class);
