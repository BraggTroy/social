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
    Route::get('/index', 'Action\IndexController@index');
    Route::get('/', 'Action\IndexController@index');
    Route::post('/comment/write', 'Action\IndexController@submitWriteComment');
});


Route::group(['middleware' => 'myauth'], function () {
    //发表说说
    Route::post('/submit/write', 'Action\IndexController@submitWrite');
    //发表文章
    Route::post('/submit/article', 'Action\ArticleController@submitArticle');
    //图片上传
    Route::post('/upload', 'Upload\imageUpload@upload');
    Route::delete('/upload/delete', 'Upload\imageUpload@delete');

    Route::get('/article', function(){return view('myapp.article');});
    Route::get('/show/{id}', 'Action\ArticleController@showArticle');
});

Route::get('/q', function(){return view('myapp.photo');});
Route::get('/w', function(){return view('myapp.friend');});
Route::get('/a', function(){return view('layouts.base');});
Route::get('/z', function(){return view('myapp.article');});
Route::get('/x', function(){return view('myapp.article_detail');});
Route::get('/c', function(){return view('myapp.home');});
Route::get('/v', function(){return view('myapp.setting');});

Route::post('/j4', function(){
    $data = [];
    $data['status'] = 1;
    $data['msg'] = '';

    $item = $item1 = $item2 = [];
    $item[0] = ['id'=>100001, 'name'=>'www', 'face'=>'/image/user'];
    $item[1] = ['id'=>100002, 'name'=>'111', 'face'=>'/image/user'];
    $item[2] = ['id'=>100003, 'name'=>'222', 'face'=>'/image/user'];
    $item[3] = ['id'=>100004, 'name'=>'333', 'face'=>'/image/user'];

    $item1[0] = ['id'=>100005, 'name'=>'www', 'face'=>'/image/user'];
    $item1[1] = ['id'=>100006, 'name'=>'111', 'face'=>'/image/user'];
    $item1[2] = ['id'=>100007, 'name'=>'222', 'face'=>'/image/user'];
    $item1[3] = ['id'=>100008, 'name'=>'333', 'face'=>'/image/user'];

    $item2[0] = ['id'=>100009, 'name'=>'www', 'face'=>'/image/user'];
    $item2[1] = ['id'=>100011, 'name'=>'111', 'face'=>'/image/user'];
    $item2[2] = ['id'=>100021, 'name'=>'222', 'face'=>'/image/user'];
    $item2[3] = ['id'=>100031, 'name'=>'333', 'face'=>'/image/user'];

    $data['data'][0] = ['name'=>'a', 'nums'=>36, 'id'=>123, 'item'=> $item];
    $data['data'][1] = ['name'=>'b', 'nums'=>16, 'id'=>1234, 'item'=> $item1];
    $data['data'][2] = ['name'=>'c', 'nums'=>26, 'id'=>1235, 'item'=> $item2];

    return json_encode($data);
});

Route::get('/ddd', 'Action\IndexController@index');

