<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('myapp.index');
});

Route::post('/register', 'Auth\RegisterController@registerUser');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/login', function(){
    return view('myapp.login');
});

