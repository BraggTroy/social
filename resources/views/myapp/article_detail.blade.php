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
                    {{--<div class="content-head-label">--}}
                        {{--<span>handlebars</span>--}}
                    {{--</div>--}}
                    {{--<div class="content-head-write">--}}
                        {{--<a href=""><i class="icon-file-alt"></i> 提交文章</a>--}}
                    {{--</div>--}}
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
                            <div class="content_comment showrep1 content_comment{{$v['id']}}">
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
                                        <span class="replay-comment" onclick="thf({{$v['id']}})">回复</span>
                                    </li>
                                </div>
                                <div class="content_comment_detail">
                                    {{ $v['comment'] }}
                                </div>

                                <div class="content_reply_create content_reply_create{{$v['id']}}" style="display: none;">
                                    <div class="content_reply_create_avatar">
                                        <img src="{{ URL::asset('/image/upload/'.$user->image['name']) }}">
                                    </div>
                                    <div class="content_reply_create_user">
                                        回复 <span>{{ $v->user['name'] }}</span>
                                    </div>
                                    <div class="content_reply_create_fm">
                                        <textarea placeholder="写下你的回复..."></textarea>
                                        <div class="btn btn_inline off">
                                            <i class="glyphicon glyphicon-send"></i>
                                            <span onclick="subCom(this, '{{$article['id']}}', '{{$v['id']}}','{{$v['id']}}', '{{$user->image['name']}}', '{{ $v->user->image['name'] }}', '{{ $user['name'] }}', '{{ $v->user['name'] }}')">发表回复</span>
                                        </div>
                                    </div>
                                </div>

                                @if(isset($zi[$v['id']]))
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
                                                <span onclick="subCom(this, '{{$article['id']}}', '{{$z['parent']}}', '{{$z['id']}}', '{{$user->image['name']}}', '{{ $z->user->image['name'] }}', '{{ $user['name'] }}', '{{ $z->user['name'] }}')">发表回复</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                    {{--回复--}}
                    <div class="content_comment_create">
                        <div class="content_comment_create_avatar">
                            <img src="https://o5wwk8baw.qnssl.com/static/image/avatar_default/avatar">
                        </div>
                        <div class="content_comment_create_user">
                            {{$user['name']}}<span>百度</span><span>php</span>
                        </div>
                        <div class="content_comment_create_fm">
                            <textarea placeholder="写下你的评论..."></textarea>
                            <div class="btn btn_inline off">
                                <i class="glyphicon glyphicon-send"></i>
                                <span onclick="subCom(this, '{{$article['id']}}', 0, 0, '{{$user->image['name']}}', '', '{{$user['name']}}', '')">发表评论</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-content">
                <div class="right-head">
                    <a href="/home/show/{{$user['id']}}" class="content_info_avatar">
                        <img src="{{ URL::asset('/image/upload/'.$article->user->image['name']) }}">
                    </a>
                    <div class="right-head-name">
                        <a href="/home/show/{{$user['id']}}">
                            {{$article->user['name']}}
                            <i class="icon-external-link"></i>
                            <span>{作者}</span>
                        </a>
                    </div>
                    <div class="right-head-zhiwei">
                        <span>{{$article->user['zhiwei']}}</span>
                    </div>
                    <div class="right-head-follow">
                        <span class="personal-add-attention">添加好友</span>
                    </div>
                </div>

                <div class="right-main">
                    <ul>
                        <li>
                            <table>
                                <tr><td><span id="num-z">{{$article['zan']}}</span></td></tr>
                                <tr><td><span>赞成</span></td></tr>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr><td><span id="num-f">{{$article['fandui']}}</span></td></tr>
                                <tr><td><span >反对</span></td></tr>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr><td><span>{{$article['fav']}}</span></td></tr>
                                <tr><td><span>收藏</span></td></tr>
                            </table>
                        </li>
                    </ul>
                    <div class="submit-time">
                        <span class="right-main-time"><i class="icon-time"></i> &nbsp;{{date('Y-m-s H:i:s', $article['time'])}} &nbsp;发布</span>
                    </div>
                </div>

                <div class="right-action">
                    <ul>
                        <li id="tttz"><span @if(isset($user->azf['z']) && $user->azf['z']==1) style="color: red;" @endif onclick="ttz({{$article['id']}})"><i class="icon-angle-up"></i> 赞成</span></li>
                        <li id="tttf"><span @if(isset($user->azf['f']) && $user->azf['f']==1) style="color: red;" @endif onclick="ttf({{$article['id']}})"><i class="icon-angle-down"></i> 反对</span></li>
                        <li><span><i class="icon-heart-empty"></i> 收藏</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.content').on('mouseenter', '.showrep1', function(){
            $(this).children('.content_comment_ctrl').css('opacity','1');
        }).on('mouseleave', '.showrep1', function(){
            $(this).children('.content_comment_ctrl').css('opacity','0');
        });

        $('.content').on('mouseenter', '.showrep2', function(){
            $(this).children('.content_reply_ctrl').css('opacity','1');
        }).on('mouseleave', '.showrep2', function(){
            $(this).children('.content_reply_ctrl').css('opacity','0');
        });

        var swi = function(id){
            $('.content_reply_create').css('display','none');
            $('.content_reply_create'+id).css('display','block');
        };

        var subCom = function(elem, articleId, parent, commentId, userImg, reUserImg, username, reusername) {
            var content = $(elem).parent().prev().val();
            $.ajax({
                url: '/article/subCom',
                type: 'POST',
                data: {
                    'articleId': articleId,
                    'content': content,
                    'parent' : parent,
                    'commentId': commentId
                },
                beforeSend: function() {
                    load();
                },
                success: function(data){
                    data = eval("("+data+")");
                    commonMsg('发表成功', 6);
                    if (parent == 0) {
                        $('.content_comments').append(
                            "<div class='content_comment showrep1 content_comment"+data['id']+"'>"+
                            '<a class="content_comment_avatar" href="">'+
                            "<img src='/image/upload/"+userImg+"'>"+
                            '</a><div class="content_comment_user">'+
                            "<a class='tra_color_bg' href=''> "+ username +" </a>"+
                            '<span>TalkingData前端开发</span></div><div class="content_comment_time"><i class="iconfont icon-time"></i> '+
                            "<span>"+data['time']+"</span>"+
                            '</div><div class="content_comment_ctrl"><li><i class="icon-comment-alt"></i> <span class="replay-comment" onclick="thf('+data['id']+')">回复</span></li></div><div class="content_comment_detail">'+
                                content +
                            '</div>'+
                            "<div class='content_reply_create content_reply_create"+data['id']+"' style='display: none;'>"+
                            '<div class="content_reply_create_avatar">'+
                            "<img src='/image/upload/"+userImg+"'>"+
                            '</div><div class="content_reply_create_user">'+
                            "回复 <span>"+ reusername +"</span>"+
                            '</div><div class="content_reply_create_fm"><textarea placeholder="写下你的回复..."></textarea><div class="btn btn_inline off"><i class="glyphicon glyphicon-send"></i>'+
                            "<span onclick=\"subCom(this, "+articleId+", "+data['id']+", "+data['id']+",'" + userImg + "','" + userImg + "','" + username + "','" + username + "')\">发表回复</span></div></div></div></div>"
                        );
                    }else {
                        $('.content_comment' + parent).append(
                            '<div class="content_replies on"><div class="content_reply showrep2"><div class="content_reply_user"><a class="content_reply_user_avatar" href="/aresn">' +
                            "<img src='/image/upload/"+userImg+"'>"+
                            "</a><a class='content_reply_user_name tra_color_bg' href='/aresn'> "+username+" </a>"+
                            "<span>回复 </span><a class='content_reply_user_avatar' href=''>"+
                            " <img src='/image/upload/"+reUserImg+"'>"+
                            "</a><a class='content_reply_user_name tra_color_bg' href=''> "+reusername+" </a>"+
                            "</div><div class='content_reply_detail'>"+content+"</div>"+
                            '<div class="content_reply_time"><i class="iconfont icon-time"></i>'+
                            "<span> "+data['time']+"</span>"+
                            "</div><div class='content_reply_ctrl'><li><i class='icon-comment-alt'></i>"+
                            "<span class='replay-comment' onclick='swi("+data['id']+")'>回复</span>"+
                            "</li></div></div></div>"+
                            "<div class='content_reply_create content_reply_create"+data['id']+"' style='display: none;'>"+
                            '<div class="content_reply_create_avatar">'+
                            "<img src='/image/upload/"+userImg+"'>"+
                            '</div><div class="content_reply_create_user">'+
                            "回复 <span>"+ reusername +"</span>"+
                            '</div><div class="content_reply_create_fm"><textarea placeholder="写下你的回复..."></textarea><div class="btn btn_inline off"><i class="glyphicon glyphicon-send"></i>'+
                            "<span onclick=\"subCom(this, "+articleId+", "+parent+", "+data['id']+",'" + userImg + "','" + reUserImg + "','" + username + "','" + reusername + "')\">发表回复</span></div></div></div>"
                        );
                    }
                },
                error: function(){
                    commonMsg('哎呀，发表失败啦', 5);
                },
                complete: function() {
                    $('.content_reply_create').css('display','none');
                    $(elem).parent().prev().val('');
                    //关闭加载层
                    layer.closeAll('loading');
                }
            });
        };

        var commonMsg = function(str, i) {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.msg(str, {time: 2000, icon:i});
            });
        };

        var load = function() {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.load(0, {shade: false});
            });
        };

        var thf = function(id){
            $('.content_reply_create').css('display', 'none');
            $('.content_reply_create'+id).css('display', 'block');
        };

        var ttz = function(id){
            $.ajax({
                url: '/article/zan',
                type: 'POST',
                data: {
                    'articleId': id
                },
                success: function(data){
                    if (data == 0) {
                        commonMsg('你已经赞过了', 5);
                    }else {
                        $('#tttz').html("<span style='color: red' onclick='ttz("+id+")'><i class='icon-angle-up'></i> 赞成</span>");
                        $('#tttf').html('<span onclick="ttf('+id+')"><i class="icon-angle-down"></i> 反对</span>');
                        if (data == 1) {
                            $('#num-z').html(parseInt($('#num-z').html())+1);
                        }else {
                            $('#num-z').html(parseInt($('#num-z').html())+1);
                            $('#num-f').html(parseInt($('#num-f').html())-1);
                        }
                    }
                }
            });
        };

        var ttf = function(id){
            $.ajax({
                url: '/article/fan',
                type: 'POST',
                data: {
                    'articleId': id
                },
                success: function(data){
                    if (data == 0) {
                        commonMsg('你已经反对过了', 5);
                    }else {
                        $('#tttz').html("<span onclick='ttz("+id+")'><i class='icon-angle-up'></i> 赞成</span>");
                        $('#tttf').html('<span style="color: red" onclick="ttf('+id+')"><i class="icon-angle-down"></i> 反对</span>');
                        if (data == 1) {
                            $('#num-f').html(parseInt($('#num-f').html())+1);
                        }else {
                            $('#num-f').html(parseInt($('#num-f').html())+1);
                            $('#num-z').html(parseInt($('#num-z').html())-1);
                        }
                    }
                }
            });
        };
    </script>
@endsection