<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/article_detail.css') }}">
</head>
<body style="overflow-x: hidden">
    <div class="content-color" style="min-width: 800px;margin-top: 0;min-height: 480px;">
        <div class="content" style="max-width: 800px">
            <div class="left-content" style="width: 100%">
                <div class="content-head">
                    <div class="content-head-title">
                        <h1>{{ $article['title'] }}</h1>
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
            </div>
        </div>
    </div>
</body>
<script src="{{ URL::asset('/js/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/layui/layui.js') }}"></script>
<script src="{{ URL::asset('/js/index.js?v=5cm1') }}"></script>


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
</html>