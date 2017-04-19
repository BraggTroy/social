@extends('layouts.base')

@section('title')
    个人主页
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/home.css?v=64') }}">
@endsection

@section('content')
    <div class="content">
        <div class="personal-detail">
            <div class="person-img">
                <img src="{{ URL::asset('/image/upload/'.$user->image['name']) }}">
                <a href="" class="personal-add-attention">添加好友</a>
            </div>
            <div class="personal-name">
                <h1>{{ $user['name'] }}</h1>
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
                <ul class="layui-nav">
                    <li class="layui-nav-item layui-this"><a href="">文章</a></li>
                    <li class="layui-nav-item"><a href="">说说</a></li>
                    <li class="layui-nav-item"><a href="">个人信息</a></li>
                </ul>
            </div>
        </div>


        <div class="content-all">
            <div class="article-show">
                @foreach($article as $v)
                    <div class="content-list article-content">
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


            <div class="content-list write-content">
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
                                    <div class="comment-item" style="padding-left: 50px;">
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
                    </div>
                </div>
                @endforeach
            </div>


            <div class="personal-zl" style="width: 60%;padding-top: 20px;margin-left: 20%;">
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
                                <aside>{{$user->set['sex'] == 1 ? '男' : ($user->set['sex'] == 0 ? '女' : '保密')}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                年龄
                            </div>
                            <div class="control">
                                <aside>{{$user->set['age']}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                手机
                            </div>
                            <div class="control">
                                <aside>{{$user->set['tel']}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                邮箱
                            </div>
                            <div class="control">
                                <aside>{{$user->set['email']}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                公司
                            </div>
                            <div class="control">
                                <aside>{{$user->set['company']}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                职位
                            </div>
                            <div class="control">
                                <aside>{{$user->set['zw']}}</aside>
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
                                <aside>{{$user->set['home']}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                大学
                            </div>
                            <div class="control">
                                <aside>{{$user->set['college']}}</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                现居住地
                            </div>
                            <div class="control">
                                <aside>{{$user->set['jz']}}</aside>
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
                layer.msg(elem.text());
            });
        });
    </script>
@endsection