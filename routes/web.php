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
use App\Model\User;

Route::get('/login', function(){
    return view('myapp.login');
});
Route::get('/logout', function(){
    \Session::put('user',null);
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

    Route::get('/article', function(){
        $user = User::getUserById(session('user'));
        return view('myapp.article', ['user'=>$user]);
    });
    Route::get('/show/{id}', 'Action\ArticleController@showArticle');
    Route::post('/article/subCom', 'Action\ArticleController@subCom');
    Route::post('/article/zan', 'Action\ArticleController@zan');
    Route::post('/article/fan', 'Action\ArticleController@fandui');

    Route::post('/write/zan', 'Action\IndexController@zan');
    Route::get('/write/sf/{writeId}', 'Action\IndexController@sf');


    Route::post('/uploadPhoto', 'Upload\imageUpload@uploadPhoto');
    Route::delete('/delPhoto', 'Upload\imageUpload@deletePhoto');
    Route::get('/photo/show/{id?}', 'Action\PhotoController@show');
    Route::post('/album/add', 'Action\PhotoController@addAlbum');
    Route::post('/album/del', 'Action\PhotoController@delAlbum');


    Route::get('/friend/show/{id?}', 'Action\FriendController@showFriend');
    Route::post('/friendgroup/add', 'Action\FriendController@addGroup');
    Route::post('/friendgroup/del', 'Action\FriendController@delGroup');

    Route::post('/friend/del', 'Action\FriendController@delFriend');
    Route::post('/friend/changename', 'Action\FriendController@changeName');
    Route::post('/friend/send', 'Action\FriendController@addFriend');
    Route::post('/friend/agree', 'Action\FriendController@agreeFriend');
    Route::post('/friend/refuse', 'Action\FriendController@refuseFriend');

    Route::post('/log/scan', 'Action\SocialLogController@scanLog');

    Route::get('/home/show/{id}', 'Action\HomeController@show');

    Route::get('/setting', 'Action\SettingController@index');
    Route::post('/set/info', 'Action\SettingController@setInfo');
    Route::post('/set/pass', 'Action\SettingController@setPasswd');
    Route::post('/set/notify', 'Action\SettingController@setNotify');


    Route::get('/json/getList.json','Action\ChatController@getFriendList');
    Route::post('/getmsg.json','Action\ChatController@getMsgBox');
    Route::post('/im/refuseFriend','Action\ChatController@refuseFriendRequest');
    Route::post('/message/read','Action\ChatController@readRequest');
});

Route::get('/passwd/forget', function(){
    return view('myapp.forgetpasswd');
});
Route::post('/passwd/forget', 'Auth\ForgotPasswordController@sendMail');
Route::post('/passwd/reset', 'Auth\ResetPasswordController@resetPass');
Route::get('/passwd/reset', ['middleware'=>'repass', function(){
    return view('myapp.resetpass');
}]);
