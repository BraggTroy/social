@extends('layouts.base')

@section('title')
    个人主页
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/home.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="personal-detail">
            <div class="person-img">
                <img src="{{ URL::asset('/image/user') }}">
                <a href="" class="personal-add-attention">关注</a>
            </div>
            <div class="personal-name">
                <h1>txw87378</h1>
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
                    <li class="layui-nav-item layui-this"><a href="">最新活动</a></li>
                    <li class="layui-nav-item"><a href="">说说</a></li>
                    <li class="layui-nav-item"><a href="">日志</a></li>
                </ul>
            </div>
        </div>


        <div class="content-all">
            <div class="content-list">
                <div class="rz-item">
                    <div class="rz-head">
                        <a href=""><img src="{{ URL::asset('/image/user') }}"></a>
                        <div class="rz-head-name">
                            <li>刘鸡蛋</li>
                            <li>发布了日志： &nbsp;<a href="" class="rz-tz">从入门到放弃</a> ·&nbsp;&nbsp;2016-05-05</li>
                        </div>
                    </div>
                    <div class="rz-content">
                        <span>
                            一：记一次工作中实现移动端手写签名。1：Signature Pad 是一款Jquery签名插件。2：移动端亲自测试书写良好。3：本文涉及Signature Pad的详解甚少，实际运用的朋友请自行百度参考使用文档或点击下方github地址。          一个简单的在线demo：http://szimek.github.io/signature_pad/  精      美
                        </span>
                    </div>
                    <div class="rz-footer">
                        <ul>
                            <li>推荐 23</li>
                            <li>阅读 243</li>
                            <li>收藏 6</li>
                            <li><a href=""><i class="icon-bookmark-empty"></i>&nbsp; 立即阅读</a></li>
                        </ul>
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