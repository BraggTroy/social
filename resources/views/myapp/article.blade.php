@extends('layouts.base')

@section('title')
    我的好友
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/article.css') }}">
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
                        <div class="bbtn">
                            <i class="glyphicon glyphicon-send"></i>
                            发布文章
                        </div>
                    </div>
                    <div class="right-bottom">
                        <p class="right-desc">附加信息</p>
                        <div class="right-action-item">
                            <p>著作权声明</p>
                            <input type="radio"><span>原创</span>
                            <input type="radio"><span>非原创</span>
                        </div>
                        <div class="right-action-item">
                            <p>原文链接</p>
                            <input type="text" class="wz" placeholder="转载的原文章网址">
                        </div>
                        <div class="right-action-item">
                            <p>评论设置</p>
                            <input type="radio"><span class="ssp">允许评论</span>
                            <input type="radio"><span>不允许评论</span>
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
            textarea: $('#editor')
            //optional options
        });
    </script>
@endsection