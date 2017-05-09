@extends('layouts.base')

@section('title')
    我的好友
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/article.css?V=1143') }}">
    <link rel="stylesheet" href="{{ URL::asset('/simditor/styles/simditor.css') }}">
@endsection

@section('content')
    <div class="content-color">
        <div class="content">
            <div class="write-left">
                <div class="write-left-title">
                    <i class="icon-reorder"></i>
                    <div class="create_main_title_in">
                        <input type="text" class="fm_create_main_title" placeholder="标题...">
                    </div>
                </div>
                <div class="write-textarea">
                    <textarea id="editor" placeholder="Balabala" autofocus ></textarea>
                </div>
            </div>

            <div class="action-right">
                <div class="right-content">
                    <div class="submit-article">
                        <div class="bbtn" onclick="submiteArticle()">
                            <i class="glyphicon glyphicon-send"></i>
                            发布文章
                        </div>
                    </div>
                    <div class="right-bottom">
                        <p class="right-desc">附加信息</p>
                        <div class="right-action-item">
                            <p>著作权声明</p>
                            <input type="radio" name="yuanchuang" class="yc" checked value="0"><span>原创</span>
                            <input type="radio" name="yuanchuang" class="yc" value="1" ><span>非原创</span>
                        </div>
                        <div class="right-action-item zhuanfa" style="display: none">
                            <p>原文链接</p>
                            <input type="text" class="wz" placeholder="转载的原文章网址">
                        </div>
                        <div class="right-action-item">
                            <p>评论设置</p>
                            <input type="radio" name="canp" checked value="0"><span class="ssp">允许评论</span>
                            <input type="radio" name="canp" value="1"><span>不允许评论</span>
                        </div>
                        <div class="right-action-item">
                            <p>可查看的人</p>
                            <input type="radio" name="see" class="see" checked value="2"><span>所有人</span>
                            <input type="radio" name="see" class="see" value="1" ><span>好友</span>
                            <input type="radio" name="see" class="see" value="0" ><span>自己</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset('/simditor/scripts/module.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/simditor/scripts/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/simditor/scripts/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/simditor/scripts/simditor.js') }}"></script>
    <script>
        var editor = new Simditor({
            textarea: $('#editor'),
            placeholder: '这里输入内容...',
            upload : {
                url : '/upload', //文件上传的接口地址
                params: { 'type' : 'article' }, //指定文件上传接口的额外参数,上传的时候随文件一起提交
                fileKey: 'qqfile', //服务器端获取文件数据的参数名
                connectionCount: 3,
                leaveConfirm: '正在上传文件'
            },
            success: (function(_this) {
                return function(data) {
                    var newresult = JSON.parse("{\"file_path\":\"http://social.c/image/upload/"+ eval("("+data+")").file_path+"}");
                    _this.trigger('uploadprogress', [file, file.size, file.size]);
                    _this.trigger('uploadsuccess', [file, newresult]);

                    return $(document).trigger('uploadsuccess', [file, newresult, _this]);
                };
            })(this)
        });

        $('.yc').change(function(){
            if($('input:radio[name="yuanchuang"]:checked').val() == "1"){
                $('.zhuanfa').css('display', 'block');
            }else {
                $('.zhuanfa').css('display', 'none');
                $('.wz').val('');
            }
        });

        var submiteArticle = function() {
            var title = $('.fm_create_main_title').val();
            var wz = $('.wz').val();
            var content = $('#editor').val();
            var yc = $('input:radio[name="yuanchuang"]:checked').val();
            var pl = $('input:radio[name="canp"]:checked').val();
            var see = $('input:radio[name="see"]:checked').val();
            $.ajax({
                type: 'POST',
                url: '/submit/article',
                data: {
                    'title': title,
                    'content': content,
                    'yc': yc,
                    'pl': pl,
                    'see': see,
                    'wz': wz
                },
                beforeSend: function() {
                    load();
                },
                success: function(){
                    xunwen('发布成功', 1);
                },
                error: function(){
                    xunwen('发布失败', 2);
                },
                complete: function(){
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

        var xunwen = function(msg,num) {
            layui.use(['layer'], function(){
                layer.confirm(msg, {
                    btn: ['确定'],
                    icon: num
                }, function(){
                    if (num == 1) {
                        window.location.href = 'http://social.cn'
                    }else {
                        layer.msg('请稍后重试');
                    }
                });
            });
        }
    </script>
@endsection