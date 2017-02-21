@extends('layouts.base')

@section('title')
    首页
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
@endsection

@section('content')
    <div id="content-color">
        <div id="content">
            <div class="left">
                <div class="left-kind">
                    <ul>
                        <li><a href=""><i class="icon-lemon"></i>&nbsp;&nbsp;好友动态</a></li>
                        <li><a href=""><i class="icon-pencil"></i>&nbsp;&nbsp;书写心情</a></li>
                        <li><a href=""><i class="icon-heart-empty"></i>&nbsp;&nbsp;特别关心</a></li>
                        <li><a href=""><i class="icon-heart-empty"></i>&nbsp;&nbsp;我收藏的</a></li>
                    </ul>
                </div>
            </div>

            <div class="middle">
                <div class="write-article">
                    <div class="before-click" >
                        <a class="before-show" href="javascript:void(0)">说点什么吧</a>
                        <a class="upload-image-icon" href=""><i class="icon-camera-retro" style="font-size: 40px"></i></a>
                    </div>
                    <div class="after-click" style="display: none">
                        <textarea class="article-input"></textarea>
                        <div class="in-textarea">
                            <span>@</span>
                            <span><t>0</t> / 240</span>
                        </div>

                        <div class="article-input-action">
                            <div class="after-action0">
                                <span>添加：</span>
                                <a href=""><i class="icon-picture"></i>&nbsp;照片</a>
                                <a href=""><i class=""></i></a>
                            </div>
                            <div class="after-image-show">

                            </div>
                            <div class="after-footer">
                                <div class="dropdown after-drop">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        仅自己可见
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu after-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <a href="" class="submit after-ok"><i class="icon-ok"></i>&nbsp;发布</a>
                                <a href="" class="submit after-cancel"><i class="icon-remove"></i>&nbsp;取消</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="article">
                    <div class="article-head">
                        <a href=""><img src="{{ URL::asset('/image/user') }}"></a>
                        <div class="article-head-name">
                            <li>刘鸡蛋</li>
                            <li>2016-05-05</li>
                        </div>
                    </div>

                    <div class="article-content">
                        <span>
                            一：记一次工作中实现移动端手写签名。1：Signature Pad 是一款Jquery签名插件。2：移动端亲自测试书写良好。3：本文涉及Signature Pad的详解甚少，实际运用的朋友请自行百度参考使用文档或点击下方github地址。          一个简单的在线demo：http://szimek.github.io/signature_pad/  精      美
                        </span>
                        <div class="article-content-image">
                            <img src="{{ URL::asset('/image/image.jpg') }}" width="250" height="250">
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
                            <a href=""><img src="{{ URL::asset('/image/user') }}"></a>
                            <a href=""><img src="{{ URL::asset('/image/user') }}"></a>
                        </div>
                        <div class="comment">
                            <div class="comment-item">
                                <a href=""><img src="{{ URL::asset('/image/user') }}"></a>
                                <div class="comment-content">
                                    <ul>
                                        <li>2016-11-11 15:50</li>
                                        <li>今天下雪了记一次工作中实现移动端手写签名。1：Signature Pad 是一款Jquery签名插件。2：移动端亲自测试书写良好。3：本文涉及Signature Pad的详</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="comment-input">
                            <span type="text" class="input-show">写下你的评论 ...</span>
                            <div class="comment-input-detial" style="display: none">
                                <textarea class="write"></textarea>
                                <div class="f-bottom">
                                    <span href=""><i class=""></i></span>
                                    <span href="">@</span>
                                    <a href="" class="submit"><i class="glyphicon glyphicon-send"></i>&nbsp;发布</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right">
                {{--<div class="friend-rec">--}}
                    {{--<div class="rec-title">--}}
                        {{--<span >可能认识的人</span>--}}
                        {{--<span style="float: right" class="refresh-friend"><i class="glyphicon glyphicon-repeat"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="friend-list">--}}
                        {{--<div class="friend-item">--}}
                            {{--<a href=""><img src="{{ URL::asset('/image/user') }}"></a>--}}
                            {{--<a href="">你很溜</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="who-see-i">
                    <div class="see-title">
                        <ul>
                            <li><a href="javascript:void(0)">可能认识的人</a></li>
                            <li><a href="javascript:void(0)">我看过谁</a></li>
                            <li><a href="javascript:void(0)">最近访客</a></li>
                        </ul>
                    </div>
                    <div class="friend-list">
                        <div class="friend-item">
                            <a href=""><img src="{{ URL::asset('/image/user') }}"></a>
                            <a href="" class="friend-list-name">你很溜</a>
                        </div>
                    </div>
                    <div class="">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
