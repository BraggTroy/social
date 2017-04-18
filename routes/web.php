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
    Route::post('/article/subCom', 'Action\ArticleController@subCom');


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

});

Route::get('/q', function(){return view('myapp.photo');});
Route::get('/w', function(){return view('myapp.friend');});
Route::get('/a', function(){return view('layouts.base');});
Route::get('/z', function(){return view('myapp.article');});
Route::get('/x', function(){return view('myapp.article_detail');});
Route::get('/c', function(){return view('myapp.home');});
Route::get('/v', function(){return view('myapp.setting');});

Route::get('/bbb', function(){return view('layouts.base');});


Route::get('/qw', function(){
    throw  new \App\Http\Controllers\Exception\TMException('4042');
});


Route::get('/json/getList.json',function(){
    return "{
  \"code\": 0
  ,\"msg\": \"\"
  ,\"data\": {
    \"mine\": {
      \"username\": \"纸飞机\"
      ,\"id\": \"100000\"
      ,\"status\": \"online\"
      ,\"sign\": \"在深邃的编码世界，做一枚轻盈的纸飞机\"
      ,\"avatar\": \"http://cdn.firstlinkapp.com/upload/2016_6/1465575923433_33812.jpg\"
    }
    ,\"friend\": [{
      \"groupname\": \"前端码屌\"
      ,\"id\": 1
      ,\"online\": 2
      ,\"list\": [{
        \"username\": \"贤心\"
        ,\"id\": \"100001\"
        ,\"avatar\": \"http://tp1.sinaimg.cn/1571889140/180/40030060651/1\"
        ,\"sign\": \"这些都是测试数据，实际使用请严格按照该格式返回\"
      },{
        \"username\": \"Z_子晴\"
        ,\"id\": \"108101\"
        ,\"avatar\": \"http://tva3.sinaimg.cn/crop.0.0.512.512.180/8693225ajw8f2rt20ptykj20e80e8weu.jpg\"
        ,\"sign\": \"微电商达人\"
      },{
        \"username\": \"Lemon_CC\"
        ,\"id\": \"102101\"
        ,\"avatar\": \"http://tp2.sinaimg.cn/1833062053/180/5643591594/0\"
        ,\"sign\": \"\"
      },{
        \"username\": \"马小云\"
        ,\"id\": \"168168\"
        ,\"avatar\": \"http://tp4.sinaimg.cn/2145291155/180/5601307179/1\"
        ,\"sign\": \"让天下没有难写的代码\"
        ,\"status\": \"offline\"
      },{
        \"username\": \"徐小峥\"
        ,\"id\": \"666666\"
        ,\"avatar\": \"http://tp2.sinaimg.cn/1783286485/180/5677568891/1\"
        ,\"sign\": \"代码在囧途，也要写到底\"
      }]
    },{
      \"groupname\": \"网红\"
      ,\"id\": 2
      ,\"online\": 3
      ,\"list\": [{
        \"username\": \"罗玉凤\"
        ,\"id\": \"121286\"
        ,\"avatar\": \"http://tp1.sinaimg.cn/1241679004/180/5743814375/0\"
        ,\"sign\": \"在自己实力不济的时候，不要去相信什么媒体和记者。他们不是善良的人，有时候候他们的采访对当事人而言就是陷阱\"
      },{
        \"username\": \"长泽梓Azusa\"
        ,\"id\": \"100001222\"
        ,\"sign\": \"我是日本女艺人长泽あずさ\"
        ,\"avatar\": \"http://tva1.sinaimg.cn/crop.0.0.180.180.180/86b15b6cjw1e8qgp5bmzyj2050050aa8.jpg\"
      },{
        \"username\": \"大鱼_MsYuyu\"
        ,\"id\": \"12123454\"
        ,\"avatar\": \"http://tp1.sinaimg.cn/5286730964/50/5745125631/0\"
        ,\"sign\": \"我瘋了！這也太準了吧  超級笑點低\"
      },{
        \"username\": \"谢楠\"
        ,\"id\": \"10034001\"
        ,\"avatar\": \"http://tp4.sinaimg.cn/1665074831/180/5617130952/0\"
        ,\"sign\": \"\"
      },{
        \"username\": \"柏雪近在它香\"
        ,\"id\": \"3435343\"
        ,\"avatar\": \"http://tp2.sinaimg.cn/2518326245/180/5636099025/0\"
        ,\"sign\": \"\"
      }]
    },{
      \"groupname\": \"我心中的女神\"
      ,\"id\": 3
      ,\"online\": 1
      ,\"list\": [{
        \"username\": \"林心如\"
        ,\"id\": \"76543\"
        ,\"avatar\": \"http://tp3.sinaimg.cn/1223762662/180/5741707953/0\"
        ,\"sign\": \"我爱贤心\"
      },{
        \"username\": \"佟丽娅\"
        ,\"id\": \"4803920\"
        ,\"avatar\": \"http://tp4.sinaimg.cn/1345566427/180/5730976522/0\"
        ,\"sign\": \"我也爱贤心吖吖啊\"
      }]
    }]
    ,\"group\": [{
      \"groupname\": \"前端群\"
      ,\"id\": \"101\"
      ,\"avatar\": \"http://tp2.sinaimg.cn/2211874245/180/40050524279/0\"
    },{
      \"groupname\": \"Fly社区官方群\"
      ,\"id\": \"102\"
      ,\"avatar\": \"http://tp2.sinaimg.cn/5488749285/50/5719808192/1\"
    }]
  }
}";
});

