@extends('layouts.base')

@section('title')
    title
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/article_detail.css') }}">
@endsection

@section('content')
    <div class="content-color">
        <div class="content">
            <div class="left-content">
                <div class="content-head">
                    <div class="content-head-title">
                        <h1>{{ $article['title'] }}</h1>
                    </div>
                    <div class="content-head-label">
                        <span>handlebars</span>
                    </div>
                    <div class="content-head-write">
                        <a href=""><i class="icon-file-alt"></i> 提交文章</a>
                    </div>
                </div>
                <div class="content-main">
                    <div class="content-main-article">
                        {!! $article['content'] !!}
                    </div>
                    @if($article['yc'] == 1)
                        <div class="content-main-zz">
                            <span>文章转载至{{ $article['wz'] }}</span>
                        </div>
                    @endif
                </div>


                <div class="content-comment">
                    <header id="section-comment" class="section-header">
                        讨论区
                        <span>(请尽量讨论和主题相关的话题)</span>

                        <div class="content_comment_create_btn">
                            <span>发表评论</span>
                        </div>
                    </header>

                    <div class="content_comments">
                        @foreach($gen as $v)
                            <div class="content_comment showrep1">
                                <a class="content_comment_avatar" href="">
                                    <img src="{{ URL::asset('/image/upload/'.$v->user->image['name']) }}">
                                </a>
                                <div class="content_comment_user">
                                    <a class="tra_color_bg" href="">{{ $v->user['name'] }}</a>
                                    <span>TalkingData前端开发</span>
                                </div>
                                <div class="content_comment_time">
                                    <i class="iconfont icon-time"></i>
                                    <span>{{ date('Y-m-d H:i', $v['time']) }}</span>
                                </div>
                                <div class="content_comment_ctrl">
                                    <li>
                                        <i class="icon-comment-alt"></i>
                                        <span class="replay-comment">回复</span>
                                    </li>
                                </div>
                                <div class="content_comment_detail">
                                    {{ $v['comment'] }}
                                </div>

                                @foreach($zi[$v['id']] as $z)
                                {{--回复评论--}}
                                <div class="content_replies on">
                                    <div class="content_reply showrep2">
                                        <div class="content_reply_user">
                                            <a class="content_reply_user_avatar" href="/aresn">
                                                <img src="{{ URL::asset('/image/upload/'.$z->user->image['name']) }}">
                                            </a>
                                            <a class="content_reply_user_name tra_color_bg" href="/aresn">{{ $z->user['name'] }}</a>
                                            <span>回复</span>
                                            <a class="content_reply_user_avatar" href="">
                                                <img src="{{ URL::asset('/image/upload/'.$z->sub->user->image['name']) }}">
                                            </a>
                                            <a class="content_reply_user_name tra_color_bg" href="">{{ $z->sub->user['name'] }}</a>
                                        </div>
                                        <div class="content_reply_detail">{{ $z['comment'] }}</div>
                                        <div class="content_reply_time">
                                            <i class="iconfont icon-time"></i>
                                            <span>{{ date('Y-m-d H:i', $z['time']) }}</span>
                                        </div>
                                        <div class="content_reply_ctrl">
                                            <li>
                                                <i class="icon-comment-alt"></i>
                                                <span class="replay-comment" onclick="swi({{$z['id']}})">回复</span>
                                            </li>
                                        </div>
                                    </div>
                                </div>

                                {{--回复--}}
                                <div class="content_reply_create content_reply_create{{$z['id']}}" style="display: none;">
                                    <div class="content_reply_create_avatar">
                                        <img src="{{ URL::asset('/image/upload/'.$user->image['name']) }}">
                                    </div>
                                    <div class="content_reply_create_user">
                                        回复 <span>{{ $z->user['name'] }}</span>
                                    </div>
                                    <div class="content_reply_create_fm">
                                        <textarea placeholder="写下你的回复..."></textarea>
                                        <div class="btn btn_inline off">
                                            <i class="glyphicon glyphicon-send"></i>
                                            <span onclick="subCom(this, '{{$article['id']}}', '{{$z['parent']}}', '{{$z['id']}}')">发表回复</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endforeach



                        {{--回复--}}
                        <div class="content_comment_create">
                            <div class="content_comment_create_avatar">
                                <img src="https://o5wwk8baw.qnssl.com/static/image/avatar_default/avatar">
                            </div>
                            <div class="content_comment_create_user">
                                txw434343<span>百度</span><span>php</span>
                            </div>
                            <div class="content_comment_create_fm">
                                <textarea placeholder="写下你的评论..."></textarea>
                                <div class="btn btn_inline off">
                                    <i class="glyphicon glyphicon-send"></i>
                                    <span onclick="subCom(this, '{{$article['id']}}', 0, 0)">发表评论</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-content">
                <div class="right-head">
                    <a href="" class="content_info_avatar">
                        <img src="{{ URL::asset('/image/upload/'.$article->user->image['name']) }}">
                    </a>
                    <div class="right-head-name">
                        <a href="">
                            {{$article->user['name']}}
                            <i class="icon-external-link"></i>
                            <span>{作者}</span>
                        </a>
                    </div>
                    <div class="right-head-zhiwei">
                        <span>{{$article->user['zhiwei']}}</span>
                    </div>
                    <div class="right-head-follow">
                        <span class="personal-add-attention">关注</span>
                    </div>
                </div>

                <div class="right-main">
                    <ul>
                        <li>
                            <table>
                                <tr><td><span>5</span></td></tr>
                                <tr><td><span>赞成</span></td></tr>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr><td><span>5</span></td></tr>
                                <tr><td><span>收藏</span></td></tr>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr><td><span>5</span></td></tr>
                                <tr><td><span>反对</span></td></tr>
                            </table>
                        </li>
                    </ul>
                    <div class="submit-time">
                        <span class="right-main-time"><i class="icon-time"></i> &nbsp;{{date('Y-m-s H:i:s', $article['time'])}} &nbsp;发布</span>
                    </div>
                </div>

                <div class="right-action">
                    <ul>
                        <li><span><i class="icon-angle-up"></i> 赞成</span></li>
                        <li><span><i class="icon-angle-down"></i> 反对</span></li>
                        <li><span><i class="icon-heart-empty"></i> 收藏</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.showrep1').mouseenter(function(){
            //鼠标移入
            $(this).children('.content_comment_ctrl').css('opacity','1');
        }).mouseleave(function(){
            //鼠标移出
            $(this).children('.content_comment_ctrl').css('opacity','0');
        });

        $('.showrep2').mouseenter(function(){
            //鼠标移入
            $(this).children('.content_reply_ctrl').css('opacity','1');
        }).mouseleave(function(){
            //鼠标移出
            $(this).children('.content_reply_ctrl').css('opacity','0');
        });

        var swi = function(id){
            $('.content_reply_create'+id).css('display','block');
        };

        var subCom = function(elem, articleId, parent, commentId) {
            var content = $(elem).parent().prev().val();
            $.ajax({
                url: '/article/subCom',
                type: 'POST',
                data: {
                    'articleId': articleId,
                    'content': content,
                    'commentId': commentId
                },
                success: function(data) {

                }
            });
        }

    </script>
@endsection