<?php

Route::resource('users', 'UserController');
Route::post('users/search', 'UserController@search');

Route::get('/{any}', function () {
    return view('layouts.master');
})->where('any', '.*');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
