<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//VerifyCsrfToken fue quitado para pruebas, colocar la protecion una vez finalizada la api 
Route::resource('pokemons', 'PokemonController');