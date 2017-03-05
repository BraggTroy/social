<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
    <link rel="shortcut icon" href="http://www.zi-han.net/theme/hplus/favicon.ico">
    <link href="{{ URL::asset('/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/register/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/register/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/register/style.min.css') }}" rel="stylesheet">

    <script>
        if(window.top !== window.self){ window.top.location = window.location;}
    </script>

    <style>
        #BAIDU_DSPUI_FLOWBAR,.adsbygoogle,.ad,div[class^="ad-widsget"],div[id^="div-gpt-ad-"],a[href*="@"][href*=".exe"],a[href*="/?/"][href*=".exe"],.adpushwin{display:none !important;}

        .form-group img {
            width: 38%;
            height: 32px;
            float: right;
            margin-top: 1px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">T+</h1>
        </div>
        <h3>欢迎注册 TalkingMore</h3>
        <p>创建一个新账户</p>
        <form class="m-t" role="form" action="/register" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="请输入邮箱" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="请输入密码" required="">
            </div>
            <div class="form-group">
                <input type="password" name="repassword" class="form-control" placeholder="请再次输入密码" required="">
            </div>
            <div class="form-group">
                <input type="password" name="yzm" class="form-control" placeholder="请输入验证码" style="width: 60%;display: inline;float: left">
                <img src="{{ URL::asset('/image/user') }}">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>

            <p class="text-muted text-center"><small>已经有账户了？</small><a href="http://www.zi-han.net/theme/hplus/login.html">点此登录</a>
            </p>

        </form>
    </div>
</div>
<script src="{{ URL::asset('/js/jquery/jquery-3.1.1.min.js') }}"></script>
<script src="{{ URL::asset('/bootstrap/js/bootstrap.js') }}"></script>

</body>
</html>