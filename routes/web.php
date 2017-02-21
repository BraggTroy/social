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
    return view('myapp.article_detail');
});

Route::get('/login', function () {
    return view('myapp.login');
});

Route::get('/regiest', function () {
    return view('myapp.regiest');
});

Route::get('/article', function () {
    return view('myapp.article');
});

Route::get('/home', function () {
    return view('myapp.home');
});

Route::get('/index', function () {
    return view('myapp.index');
});

Route::get('/setting', function () {
    return view('myapp.setting');
});

Route::get('/login', function () {
    return view('myapp.login');
});

Route::get('/regeister', function () {
    return view('myapp.regeister');
});
