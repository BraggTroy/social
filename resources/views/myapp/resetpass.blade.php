<!DOCTYPE html>
<!-- saved from url=(0044)http://www.zi-han.net/theme/hplus/login.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>重置密码</title>

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
            <input type="password" name="password" class="password p1 form-control" placeholder="请输入新密码" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="password p2 form-control" placeholder="请再次输入密码" required>
        </div>
        <button type="submit" style="margin-top: 20px;margin-bottom: 20px" class="btn btn-primary block full-width m-b" onclick="login()">重置</button>


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
        if ($('.p1').val().length < 6){
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.msg('密码长度必须大于6位')
            });
            return;
        }
        if ($('.p1').val() != $('.p2').val()){
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.msg('两次密码不一样')
            });
            return;
        }
        $.ajax({
            type: 'POST',
            url: document.URL,
            data: {
                'pass' : $('.p2').val(),
            },
            beforeSend: function() {
                load();
            },
            success: function(){
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.closeAll('loading');
                    layer.msg('修改密码成功，即将跳转到登陆页');
                    setTimeout(function(){
                        window.location.href = '/login';
                    },3000);
                });
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