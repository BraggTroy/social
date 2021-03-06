<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/head.css?v=4eee5r') }}">
    @yield('css')
</head>
<body>
    <div id="head">
        <div class="head-content">
            <a href="/index">
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
                            <img src="{{ URL::asset('/image/upload/'.$user->image['name']) }}">&nbsp;
                            {{$user['name']}}
                        </strong>
                        <div class="menu mmm menu1" style="display: none">
                            <div class="arrow"></div>
                            <a href="/setting"><i class="icon-news"></i>设置</a>
                            <a href="/logout"><i class="icon-cc-code icon_fs_18"></i>退出登录</a>
                        </div>
                    </li>
                    <li id="menu2">
                        <strong><i class="icon-bell"></i>&nbsp;&nbsp;通知</strong>
                        <div class="menu menu2" style="display: none">
                            <div class="arrow"></div>
                            {{--<div class="nav_notify_tab">--}}
                                {{--<div class="item on ttt-friend">--}}
                                        {{--<i class="icon-user"></i>--}}
                                        {{--<span class="">好友</span>--}}
                                {{--</div>--}}
                                {{--<div class="item ttt-msg">--}}
                                        {{--<i class="icon-comment"></i>--}}
                                        {{--<span>信息</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="nav_notify_list_out">
                                {{--<div class="load">--}}
                                    {{--<img src="{{URL::asset('/image/loading_google.gif')}}">--}}
                                {{--</div>--}}
                                {{--<div class="nav_notify_list follow ttt-friend-flow" >--}}
                                    {{--<div class="nav_notify_list_tip">暂无新消息</div>--}}
                                    {{--<div class="nav_notify_item ttt-add-friend">--}}
                                        {{--<a class="avatar" target="_self" href="">--}}
                                            {{--<img src="https://o5wwk8baw.qnssl.com/static/image/avatar_default/avatar">--}}
                                        {{--</a>--}}
                                        {{--<a class="name" target="_self" href="">376522507</a>--}}
                                        {{--<span class="time"> · <em>1分钟前</em></span>--}}
                                        {{--<p class="user">--}}
                                            {{--<span class="job"></span>--}}
                                            {{--<span class="da">dd</span>--}}
                                        {{--</p>--}}
    {{----}}
                                        {{--<div class="follow on yyy-fri">添加</div>--}}
                                        {{--<div class="reject on yyy-fri">拒绝</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="nav_notify_list vote ttt-msg-flow" id="lay_de1">
                                    {{--<div class="nav_notify_list_tip">暂无新消息</div>--}}
                                    {{--<div class="nav_notify_item ttt-add-friend">--}}
                                        {{--<a class="avatar" target="_self" href="">--}}
                                            {{--<img src="https://o5wwk8baw.qnssl.com/static/image/avatar_default/avatar">--}}
                                        {{--</a>--}}
                                        {{--<a class="name" target="_self" href="">376522507</a>--}}
                                        {{--<span class="time"> · <em>1分钟前</em></span>--}}
                                        {{--<p class="user" style="margin-top: 3px">--}}
                                            {{--<span class="job"></span>--}}
                                            {{--<span class="da">评论了你的文章</span>--}}
                                            {{--<span class="head-see" onclick="" style="cursor:pointer;float: right;font-size: 10px;display: none">查看</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="menu3">
                        <strong ><i class="icon-pencil"></i>&nbsp;&nbsp;撰写</strong>
                        <div class="menu mmm menu3" style="display: none">
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
    <input type="hidden" id="userId" value="{{ $user['id'] }}">
    @yield('content')

    <script src="{{ URL::asset('/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/layui/layui.js') }}"></script>
    <script src="{{ URL::asset('/js/head.js?v=4ee44f') }}"></script>
    <script>
        layui.use('flow', function() {
            var flow = layui.flow;

            flow.load({
                elem: '#lay_de1' //流加载容器
                , done: function (page, next) { //执行下一页的回调
                    $.post('/log/scan', {
                        page: page || 1
                    }, function(res){
                        res = eval("("+res+")");
                        var lis = [];
                        layui.each(res.data, function(index, item){
                            lis[index] = '<div class="nav_notify_item ttt-add-friend"><a class="avatar" target="_self" href=""><img src="/image/upload/'+item['image']+'"></a><a class="name" target="_self" href="">'+item['name']+'</a><span class="time"> · <em>'+item['time']+'</em></span><p class="user"><span class="job"></span><span class="da">'+item['content']+'</span><span class="head-see" onclick="showWrite(\''+item['lianjie']+'\')" style="cursor:pointer;float: right;font-size: 10px;display: none">查看</span></p></div>'
                        });
                        next(lis.join(''), page < res.pages);
                    });
                }
            });
        });

        $('#lay_de1').on('mouseenter', '.ttt-add-friend', function(){
            //鼠标移入
            $(this).find('.head-see').css('display','block');
        }).on('mouseleave', '.ttt-add-friend', function(){
            //鼠标移出
            $(this).find('.head-see').css('display','none');
        });

        var showWrite = function(lianjie){
            var f = lianjie.indexOf("/show");
            if (f == 0) {
                window.location.href = lianjie;
            }else {
                layui.use('layer', function() {
                    var layer = layui.layer;
                    layer.open({
                        type: 2,
                        title: '说说',
                        area: ['800px', '500px'],
                        fixed: false, //不固定
                        maxmin: true,
                        content: lianjie
                    });
                });
            }

        };
    </script>
    @yield('js')
</body>
</html>