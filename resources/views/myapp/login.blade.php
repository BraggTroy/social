<!DOCTYPE html>
<!-- saved from url=(0044)http://www.zi-han.net/theme/hplus/login.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>

    <link rel="shortcut icon" href="http://www.zi-han.net/theme/hplus/favicon.ico">
    <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
    <link href="{{ URL::asset('/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('/css/register/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/register/style.min.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top !== window.self){ window.top.location = window.location;}
    </script>
    <style>
        /*layer*/
        .layui-layer-loading0 {
            margin: 0 auto;
        }
        #BAIDU_DSPUI_FLOWBAR,.adsbygoogle,.ad,div[class^="ad-widsget"],div[id^="div-gpt-ad-"],a[href*="@"][href*=".exe"],a[href*="/?/"][href*=".exe"],.adpushwin{display:none !important;}
    </style>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">T+</h1>

        </div>

        {{--错误信息显示--}}
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <h3 style="color:red;">{{ $error }}</h3>
            @endforeach
        @else
                <h3>欢迎使用 TalkingMore</h3>
        @endif

        {{--<form class="m-t" role="form" action="/login" method="post">--}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input type="email" name="email" class="email form-control" placeholder="邮箱" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="password form-control" placeholder="密码" required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b" onclick="login()">登 录</button>


            <p class="text-muted text-center">
                <a href="http://www.zi-han.net/theme/hplus/login.html#">
                    <small>忘记密码了？</small>
                </a> |
                <a href="http://www.zi-han.net/theme/hplus/register.html">注册一个新账号</a>
            </p>

        {{--</form>--}}
    </div>
</div>
<script src="{{ URL::asset('/js/jquery/jquery-3.1.1.min.js') }}"></script>
<script src="{{ URL::asset('/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('/layui/layui.js') }}"></script>
<script>
    var login = function() {
        var emailpattern = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
        if (!emailpattern.test($('.email').val())) {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.msg('邮箱格式错误')
            });
            return;
        }
        if ($('.password').val().length < 6){
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.msg('密码长度必须大于6位')
            });
            return;
        }
        $.ajax({
            type: 'POST',
            url: '/login',
            data: {
                'email' : $('.email').val(),
                'password' : $('.password').val()
            },
            beforeSend: function() {
                load();
            },
            success: function(){
                    window.location.href = '/index';
            },
            error: function(data) {
                data = eval('(' + data.responseText + ')');
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.closeAll('loading');
                    layer.alert(data['msg']);
                });
            }
        });
    };

    var load = function() {
        layui.use(['layer'], function(){
            var layer = layui.layer;
            layer.load(0, {shade: false});
        });
    };
</script>


</body></html>