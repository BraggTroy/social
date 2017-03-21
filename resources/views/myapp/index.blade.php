@extends('layouts.base')

@section('title')
    首页
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css?v=q1e2') }}">
    <link rel="stylesheet" href="{{ URL::asset('/fileinput/css/fileinput.css') }}">
@endsection

@section('content')
    <div id="content-color">
        <div id="content">
            <div class="left">
                <div class="left-kind">
                    <ul>
                        {{--<li><a href=""><i class="icon-lemon"></i>&nbsp;&nbsp;好友动态</a></li>--}}
                        {{--<li><a href=""><i class="icon-pencil"></i>&nbsp;&nbsp;书写心情</a></li>--}}
                        {{--<li><a href=""><i class="icon-heart-empty"></i>&nbsp;&nbsp;特别关心</a></li>--}}
                        {{--<li><a href=""><i class="icon-heart-empty"></i>&nbsp;&nbsp;我收藏的</a></li>--}}
                    </ul>
                </div>
            </div>

            {{--上传图片--}}
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width: 960px;height: 620px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">选择图片上传</h4>
                        </div>
                        <div class="modal-body ttt-modal-body">
                            <input id="ttt_input" class="file" name="file" type="file" multiple >
                        </div>
                        <div class="modal-footer" id="up-modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">完成</button>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

            <div class="middle">
                <div class="write-article" style="display: none;">
                    {{--<div class="before-click" >--}}
                        {{--<a class="before-show" href="javascript:void(0)">说点什么吧</a>--}}
                        {{--<a class="upload-image-icon" href=""><i class="icon-camera-retro" style="font-size: 40px"></i></a>--}}
                    {{--</div>--}}
                    <div class="after-click">
                        <textarea class="article-input" oninput="wordNum(this.value)"></textarea>
                        <div class="in-textarea">
                            <span>@</span>
                            <span><t class="text_num">0</t> / 240</span>
                        </div>

                        <div class="article-input-action">
                            <div class="after-action0">
                                <span>添加：</span>
                                <span data-toggle="modal" data-target="#myModal"><i class="icon-picture"></i>&nbsp;照片</span>
                                <a href=""><i class=""></i></a>
                            </div>
                            <div class="after-image-show" style="display: none">

                            </div>
                            <div class="after-footer">
                                <div class="after-drop">
                                    <button class="btn btn-default">
                                        <span class="btn-name" value="0">仅自己可见&nbsp;</span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="after-menu" style="display: none">
                                        <li><span onclick="choiceShow(this)" value="0">仅自己可见</span></li>
                                        <li><span onclick="choiceShow(this)" value="1">好友可见</span></li>
                                        <li><span onclick="choiceShow(this)" value="2">所有人可见</span></li>
                                    </ul>
                                </div>
                                <span class="submit after-ok" onclick="submitWrite()"><i class="icon-ok"></i>&nbsp;发布</span>
                                <span class="submit after-cancel"><i class="icon-remove"></i>&nbsp;取消</span>
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
                            {{--一张图片--}}
                            <img src="{{ URL::asset('/image/image.jpg') }}" >
                            {{--二张图片--}}
                            {{--三张图片--}}
                            {{--四张图片--}}
                            {{--四张以上--}}

                            <img src="{{ URL::asset('/image/image.jpg') }}" width="250" height="250">
                            {{--<img src="{{ URL::asset('/image/image.jpg') }}" width="250" height="250">--}}
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

@section('js')
    <script src="{{ URL::asset('/fileinput/js/fileinput.js') }}"></script>
    <script src="{{ URL::asset('/fileinput/js/locales/zh.js') }}"></script>
    <script src="{{ URL::asset('/js/index.js?v=4') }}"></script>
    <script src="{{ URL::asset('/js/upload.js?v=121') }}"></script>
@endsection