<?php

Route::middleware('auth')->group(function() {
    
    Route::post('users/search', 'UserController@search')->name('users.search');
    
    Route::post('users/{user}', 'UserController@update')->name('users.update');
    
    Route::resource('users', 'UserController')->only([
        'index', 'store', 'destroy'
    ]);
    
    Route::resource('rols', 'RolController');

    Route::get('/', function(){
        return view('layouts.master');
    });

});

Auth::routes();

// Route::get('/{any}', function () {
//     return view('layouts.master');
// })->where('any', '.*');


// Route::get('/home', 'HomeController@index')->name('home');


