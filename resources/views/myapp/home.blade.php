@extends('layouts.base')

@section('title')
    个人主页
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/home.css?v=6e4rf') }}">
@endsection

@section('content')
    <div class="content">
        <div class="personal-detail">
            <div class="person-img">
                <img src="{{ URL::asset('/image/upload/'.$user2->image['name']) }}">
                @if($user2['id'] != session('user') && !$isFriend)
                    <a href="javascript:addFriend({{$user2['id']}})" class="personal-add-attention">添加好友</a>
                @elseif( $isFriend)
                    <a  class="personal-add-attention">已是好友</a>
                @endif
            </div>
            <div class="personal-name">
                <h1>{{ $user2['name'] }}</h1>
            </div>
            <div class="personal-desc">
                <span class="pf">1 篇说说</span>
                <span class="pf">2 篇日志</span>
                <span class="pf pffs pff">3 个粉丝</span>
                <span class="pf pfgz pff">4 个关注</span>
            </div>
        </div>

        <div class="home-nav">
            <div class="ttt-nav">
                <ul class="layui-nav" lay-filter="demo">
                    <li class="layui-nav-item layui-this" value="0"><a href="javascript:void(0)">文章</a></li>
                    <li class="layui-nav-item" value="1"><a href="javascript:void(0)">说说</a></li>
                    <li class="layui-nav-item" value="2"><a href="javascript:void(0)">个人信息</a></li>
                </ul>
            </div>
        </div>


        <div class="content-all">
            <div class="article-show content-ttt">
                @foreach($article as $v)
                    <div class="content-list ">
                        <div class="rz-item">
                            <div class="rz-head">
                                <a href=""><img src="{{ URL::asset('/image/upload/'.$v->user->image['name']) }}"></a>
                                <div class="rz-head-name">
                                    <li>{{$v->user['name']}}</li>
                                    <li>发布了日志： &nbsp;
                                        <a href="/show/{{$v['id']}}" class="rz-tz">{{$v['title']}}</a> ·&nbsp;&nbsp;{{date('Y-m-d H:i:s', $v['time'])}}
                                    </li>
                                </div>
                            </div>
                            <div class="rz-content">
                            <span>
                               {!! $v['content'] !!}
                            </span>
                            </div>
                            <div class="rz-footer">
                                <ul>
                                    <li>推荐 {{$v['zan']}}</li>
                                    <li>阅读 {{$v['read']}}</li>
                                    <li>收藏 {{$v['fav']}}</li>
                                    <li><a href="/show/{{$v['id']}}"><i class="icon-bookmark-empty"></i>&nbsp; 立即阅读</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="content-y write-content content-ttt" style="display: none">
                @foreach($write as $v)
                <div class="article">
                    <div class="article-head">
                        <a href=""><img src="{{ URL::asset('/image/upload/'.$v->user->image['name']) }}"></a>
                        <div class="article-head-name">
                            <li>{{$v->user['name']}}</li>
                            <li>{{date('Y-m-d H:i', $v['time'])}}</li>
                        </div>
                    </div>

                    <div class="article-content">
                        <span>
                            {{$v['content']}}
                        </span>
                        <div class="article-content-image">
                            @foreach($v->image as $image)
                            <img src="{{ URL::asset('/image/upload/'.$image['name']) }}" width="225" height="226">
                            @endforeach
                        </div>
                    </div>

                    <div class="article-footer">
                        <div class="article-action">
                            <ul>
                                <li><span><i class="icon-comment-alt"></i>&nbsp;评论</span></li>
                                <li><span><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;点赞</span></li>
                                <li><span><i class="icon-star-empty"></i>&nbsp;收藏</span></li>
                                <li><span><i class="icon-share"></i>&nbsp;转发</span></li>
                            </ul>
                        </div>
                        <div class="article-zan-icon">
                            <a href="" class="zan-icon"><i class="glyphicon glyphicon-thumbs-up"></i></a>
                            @foreach($v->wzan as $zan)
                            <a href="">
                                <img src="{{ URL::asset('/image/upload/'.$zan->user->image['name']) }}">
                            </a>
                            @endforeach
                        </div>
                        <div class="comment">
                            @foreach($v->comment as $comment)
                                @if($comment['parent'] == 0)
                                    <div class="comment-item">
                                        <a href=""><img src="{{ URL::asset('/image/upload/' . $comment->user->image['name']) }}"></a>
                                        <div class="comment-content">
                                            <ul>
                                                <li>{{ $comment->user['name'] }} &nbsp;{{ date('Y-m-d H:i', $comment['time']) }}<span class="res res{{$comment['id']}}" onclick="reComment('{{$v['id']}}','{{$comment['id']}}')">回复</span></li>
                                                <li>{{ $comment['comment'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="comment-item">
                                        <a href=""><img src="{{ URL::asset('/image/upload/' . $comment->user->image['name']) }}"></a>
                                        <div class="comment-content">
                                            <ul>
                                                <li>{{ $comment->user['name'] }} 回复 {{ $comment->reuser['name'] }}{{ $comment->user['name'] }}&nbsp;{{ date('Y-m-d H:i', $comment['time']) }}<span class="res res{{$comment['id']}}" onclick="reComment('{{$v['id']}}','{{$comment['id']}}')">回复</span></li>
                                                <li>{{ $comment['content'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="comment-input comment-input{{$v['id']}}">
                            <img src="{{ URL::asset('/image/upload/' . $user2->image['name']) }}">
                            <span type="text" class="input-show input-show{{$v['id']}}" onclick="showComment(this)">写下你的评论 ...</span>
                            <div class="comment-input-detial comment-input-detial{{$v['id']}}" style="display: none">
                                <textarea class="write write{{$v['id']}}"></textarea>
                                <div class="f-bottom">
                                    <span href=""><i class=""></i></span>
                                    <span href="">@</span>
                                    <a href="javascript:submitComment('{{ $v['id'] }}', '{{$user2['name']}}', '{{$user2->image['name']}}')" class="submit" ><i class="glyphicon glyphicon-send"></i>&nbsp;发布</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="personal-zl content-ttt" style="display:none;width: 60%;padding-top: 20px;margin-left: 20%;">
                <div class="setting-main">
                    <div class="setting-main-head">
                        <h2>基本资料</h2>
                        <h3>基本信息和工作信息</h3>
                    </div>
                    <div class="setting-main-content">
                        <div class="setting-main-item">
                            <div class="label">
                                性别
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['sex'] == 1 ? '男' : ($user2->set['sex'] == 0 ? '女' : '保密')}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                年龄
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['age'] ? $user2->set['age'] : '.'}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                手机
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['tel'] ? $user2->set['tel'] : '.'}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                邮箱
                            </div>
                            <div class="control">
                                <aside>{{$user2['email'] ? $user2['email'] : '.'}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                公司
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['company'] ? $user2->set['company'] : '.'}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                职位
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['zw'] ? $user2->set['zw'] : '.'}}</aside>
                            </div>
                        </div>
                    </div>

                    <hr class="setting-hr">

                    <div class="setting-main-head">
                        <h2>更多信息</h2>
                        <h3>个性化信息和社会化信息</h3>
                    </div>
                    <div class="setting-main-content">
                        <div class="setting-main-item">
                            <div class="label">
                                家乡
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['home'] ? $user2->set['home'] : '.'}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                大学
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['college'] ? $user2->set['college'] : '.'}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                现居住地
                            </div>
                            <div class="control">
                                <aside>{{$user2->set['jz'] ? $user2->set['jz'] : '.'}}</aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(window).scroll(function(event){

        });

        layui.use('element', function(){
            var element = layui.element();
            element.on('nav(demo)', function(elem){
                $('.content-ttt').css('display', 'none');
                if(elem.val() == 0){
                    $('.article-show').css('display', 'block');
                }else if(elem.val() == 1){
                    $('.write-content').css('display', 'block');
                }else if(elem.val() == 2){
                    $('.personal-zl').css('display', 'block');
                }
                $('.layui-nav .layui-this').removeClass('layui-this');
                $(elem).addClass('layui-this');
            });
        });

        $('.comment').on('mouseenter', '.comment-item', function(){
            //鼠标移入
            $(this).find('.res').css('display','block');
        }).on('mouseleave', '.comment-item', function(){
            //鼠标移出
            $(this).find('.res').css('display','none');
        });

        var submitComment = function(id, name, image) {
            var content = $('.write' + id).val();
            $.ajax({
                type: "POST",
                url: "/comment/write",
                data: {
                    'content': content,
                    'id' : id
                },
                beforeSend: function() {
                    load();
                },
                success: function(data){
                    commonMsg('发表成功', 6);
                    data = eval("("+data+")");
                    var h = '<div class="comment-item">'+
                        '<a href=""><img src="/image/upload/'+image+'"></a>'+
                        '<div class="comment-content">'+
                        '<ul>'+
                        "<li>"+ name + ' 回复 ' +
                        data['time']+
                        "<span class='res res"+data['id']+"'>回复</span></li>"+
                        "<li>"+content+"</li></ul></div></div>";
                    $('.comment').append(h);
                },
                error: function(){
                    commonMsg('哎呀，发表失败啦', 5);
                },
                complete: function() {
                    $('.comment-input-detial'+id).hide();
                    $('.input-show'+id).show();
                    $('.write' + id).val('');
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

        $('.comment-item').mouseenter(function(){
            //鼠标移入
            $(this).find('.res').css('display','block');
        }).mouseleave(function(){
            //鼠标移出
            $(this).find('.res').css('display','none');
        });

        var cancelComment = function() {
            $('.input-show').show();
            $('.input-show').siblings('div').hide();
        };
        $('.comment-input-detial').on('blur', function(){
            cancelComment();
        });


        //layer弹出框
        var commonMsg = function(str, i) {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.msg(str, {time: 2000, icon:i});
            });
        };


        var showComment = function(elem){
            $(elem).siblings('div').show();
            $(elem).siblings('div').children('textarea').focus();
            // $('.comment-input-detial').show();
            $(elem).hide();
        };

        var addFriend = function(id){
            layer.prompt({title: '请输入附加消息'}, function(val, index){
                $.ajax({
                    url: '/friend/send',
                    type: 'POST',
                    data: {
                        'friendId' : id,
                        'remark': val
                    },
                    success: function(){
                        commonMsg('好友请求已发送', 6);
                    },
                    error: function(data) {
                        data = eval('(' + data.responseText + ')');
                        layer.msg(data['msg']);
                    }
                });
                layer.close(index);
            });
        }
    </script>
@endsection