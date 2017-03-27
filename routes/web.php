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

//登录注册
Route::get('/login', function(){
    return view('myapp.login');
});
Route::get('/register', function(){
    return view('myapp.register');
});
Route::post('/register', 'Auth\RegisterController@registerUser');
Route::post('/login', 'Auth\LoginController@login');

// 验证是否登录
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
    Route::delete('/upload/delete', 'Upload\imageUpload@delete');
});

Route::get('/q', function(){return view('myapp.photo');});
Route::get('/w', function(){return view('myapp.friend');});
Route::get('/a', function(){return view('layouts.base');});
Route::get('/z', function(){return view('myapp.article');});
Route::get('/x', function(){return view('myapp.article_detail');});
Route::get('/c', function(){return view('myapp.home');});
Route::get('/v', function(){return view('myapp.setting');});

