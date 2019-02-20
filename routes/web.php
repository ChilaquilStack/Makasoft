<?php

Route::post('pokemons/search', 'PokemonController@search');
Route::post('pokemons/{pokemon}', 'PokemonController@update');
Route::resource('pokemons', 'PokemonController');

Route::get('/{any}', function () {
    return view('layouts.master');
})->where('any', '.*');

