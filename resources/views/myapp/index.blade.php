@extends('layouts.base')

@section('title')
    首页
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css?v=q1f') }}">
    <link rel="stylesheet" href="{{ URL::asset('/fineuploader/fine-uploader-gallery.css') }}">
@endsection

@section('content')
    @include('template.uploader')

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
                            {{--初始化上传控件--}}
                            <div id="fine-uploader-s3"></div>
                        </div>
                        <div class="modal-footer" id="up-modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">完成</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="middle" >
                <div class="write-article" style="display: none;">
                    <div class="after-click">
                        <textarea class="article-input" oninput="wordNum(this.value)"></textarea>
                        <div class="in-textarea">
                            <span>@</span>
                            <span><t class="text_num">0</t> / 240</span>
                        </div>

                        <div class="article-input-action">
                            <div class="after-action0">
                                <span>添加：</span>
                                <span id="managePic" data-toggle="modal" data-target="#myModal"><i class="icon-picture"></i>&nbsp;照片</span>
                                <a href=""><i class=""></i></a>
                            </div>
                            <div class="after-image-show" id="showImage" style="display: none">
                                <div>
                                </div>
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
                            {{--二张图片--}}
                            {{--<img src="{{ URL::asset('/image/image.jpg') }}" width="340" height="340">--}}
                            {{--三张图片--}}
                            <img src="{{ URL::asset('/image/image.jpg') }}" width="225" height="226">

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
                                        <li>2016-11-11 15:50<span class="res">回复</span></li>
                                        <li>今天下雪了记一次工作中实现移动端手写签名。1：Signature Pad 是一款Jquery签名插件。2：移动端亲自测试书写良好。3：本文涉及Signature Pad的详</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="comment-input">
                            <img src="{{ URL::asset('/image/user') }}">
                            <span type="text" class="input-show" onclick="showComment(this)">写下你的评论 ...</span>
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
    <script src="{{ URL::asset('/fineuploader/jquery.fine-uploader.js') }}"></script>
    <script src="{{ URL::asset('/js/uploader.js') }}"></script>
    <script src="{{ URL::asset('/js/index.js?v=3') }}"></script>
@endsection