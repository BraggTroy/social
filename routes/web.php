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

Route::get('/', function(){
   return Redirect::to('/index');
});

Route::post('/register', 'Auth\RegisterController@registerUser');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/login', function(){
    return view('myapp.login');
});


Route::group(['middleware' => 'myauth'], function () {
    Route::get('/index', function(){
        return view('myapp.index');
    });
});

//上传
Route::group(['middleware' => 'myauth'], function () {
    //发表说说
    Route::post('/submit/write', 'Action\IndexController@submitWrite');
    //图片上传
    Route::post('/upload', 'Upload\imageUpload@upload');
    Route::post('/upload/delete', 'Upload\imageUpload@delete');
});

