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
            <h3></h3>
        @endif
        <h1 style="margin-top: 50px;"></h1>
        <div class="form-group">
            <input type="email" name="email" class="email form-control" placeholder="请输入注册邮箱" value="{{ old('name') }}" required>
        </div>

        <button type="submit" style="margin-top: 20px;margin-bottom: 20px" class="btn btn-primary block full-width m-b" onclick="login()">找回密码</button>


        <p class="text-muted text-center">
            <a href="/login">
                <small>登录  </small>
            </a> |
            <a href="/register">注册一个新账号</a>
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
        $.ajax({
            type: 'POST',
            url: '/passwd/forget',
            data: {
                'email' : $('.email').val()
            },
            beforeSend: function() {
                load();
            },
            success: function(){
                layer.alert('发送成功，请及时查收');
            },
            error: function(data) {
                data = eval('(' + data.responseText + ')');
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.closeAll('loading');
                    layer.alert(data['msg']);
                });
            },
            complete: function() {
                //关闭加载层
                layer.closeAll('loading');
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