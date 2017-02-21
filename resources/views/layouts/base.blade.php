<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/head.css') }}">
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
                    <li><a href=""><i class="icon-home"></i>&nbsp;首页</a></li>
                    <li><a href=""><i class="icon-picture"></i>&nbsp;相册</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-user"></i>&nbsp;好友</a></li>
                    <li><a href=""><i class="icon-book"></i>&nbsp;个人主页</a></li>
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
                    <li>
                        <strong onclick="console.log('dd')">
                            <img src="{{ URL::asset('/image/user') }}">&nbsp;
                            你很溜
                        </strong>
                    </li>
                    <li><strong><i class="icon-bell"></i>&nbsp;&nbsp;通知</strong></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('content')

    <script src="{{ URL::asset('/js/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/layui/layui.js') }}"></script>
    @yield('js')
</body>
</html>