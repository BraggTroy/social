<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/head.css?v=4e') }}">
    @yield('css')
</head>
<body>
    <div id="head">
        <div class="head-content">
            <a href="">
                <img src="{{ URL::asset('/image/icon.png') }}">
            </a>

            <div class="head-menu">
                <ul>
                    <li><a href="/index"><i class="icon-home"></i>&nbsp;首页</a></li>
                    <li><a href="/photo/show"><i class="icon-picture"></i>&nbsp;相册</a></li>
                    <li><a href="/friend/show"><i class="glyphicon glyphicon-user"></i>&nbsp;好友</a></li>
                    <li><a href="/home/show/{{session('user')}}"><i class="icon-book"></i>&nbsp;个人主页</a></li>
                </ul>
            </div>

            <div class="head-search">
                <input type="text" class="head-input" placeholder="搜索文章、用户">
                <a href="">
                    <i class="glyphicon glyphicon-search" style="color: #696d71"></i>
                </a>
            </div>

            <div class="head-me">
                <ul>
                    <li id="menu1">
                        <strong>
                            <img src="{{ URL::asset('/image/user') }}">&nbsp;
                            你很溜
                        </strong>
                        <div class="menu menu1" style="display: none">
                            <div class="arrow"></div>
                            <a href="/setting/{{session('user')}}"><i class="icon-news"></i>设置</a>
                            <a href="/logout"><i class="icon-cc-code icon_fs_18"></i>退出登录</a>
                        </div>
                    </li>
                    <li id="menu2">
                        <strong><i class="icon-bell"></i>&nbsp;&nbsp;通知</strong>
                        <div class="menu menu2" style="display: none">
                            <div class="arrow"></div>
                            <div class="nav_notify_tab">
                                <div class="item on">
                                    <i class="icon-users"></i>
                                    <span>关注</span>
                                </div>
                                <div class="item">
                                    <i class="icon-heart"></i>
                                    <span>互动</span>
                                </div>
                            </div>
                            <div class="nav_notify_list_out">
                                <div class="load">
                                    <img src="{{URL::asset('/image/loading_google.gif')}}">
                                </div>
                                <div class="nav_notify_list follow" >
                                    <div class="nav_notify_list_tip">暂无新消息</div>
                                </div>
                                <div class="nav_notify_list vote" style="display: none;">
                                    <div class="nav_notify_list_tip">暂无新消息</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="menu3">
                        <strong ><i class="icon-pencil"></i>&nbsp;&nbsp;撰写</strong>
                        <div class="menu menu3" style="display: none">
                            <div class="arrow"></div>
                            <a href="javascript:showWriteArticle()"><i class="icon-news"></i>文章</a>
                            <a href="/article"><i class="icon-cc-code icon_fs_18"></i>最佳实践</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    @yield('content')

    <script src="{{ URL::asset('/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/layui/layui.js') }}"></script>
    <script src="{{ URL::asset('/js/head.js?v=12314') }}"></script>
    @yield('js')
</body>
</html>