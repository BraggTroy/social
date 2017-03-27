@extends('layouts.base')

@section('title')
    我的相册
@endsection

@section('css')
    <link href="{{ URL::asset('/css/photo/font-awesome.min93e3.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/photo/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/photo/style.min862f.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/css/friend.css') }}">
@endsection

@section('content')
    <div class="content-all">
        <div class="content">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="file-manager">
                                    <h5>显示：</h5>
                                    <a href="file_manager.html#" class="file-control active">所有</a>
                                    <a href="file_manager.html#" class="file-control">文档</a>
                                    <a href="file_manager.html#" class="file-control">视频</a>
                                    <a href="file_manager.html#" class="file-control">图片</a>
                                    <div class="hr-line-dashed"></div>
                                    <button class="btn btn-primary btn-block">上传文件</button>
                                    <div class="hr-line-dashed"></div>
                                    <h5>好友分组</h5>
                                    <ul class="folder-list" style="padding: 0">
                                        <li><a href="file_manager.html"><i class="fa fa-folder"></i> 文件</a>
                                        </li>
                                        <li><a href="file_manager.html"><i class="fa fa-folder"></i> 图片</a>
                                        </li>
                                        <li><a href="file_manager.html"><i class="fa fa-folder"></i> Web页面</a>
                                        </li>
                                        <li><a href="file_manager.html"><i class="fa fa-folder"></i> 插图</a>
                                        </li>
                                        <li><a href="file_manager.html"><i class="fa fa-folder"></i> 电影</a>
                                        </li>
                                        <li><a href="file_manager.html"><i class="fa fa-folder"></i> 书籍</a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 animated fadeInRight">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="file-box">
                                    <div class="file">
                                        <a href="file_manager.html#">
                                            <span class="corner"></span>

                                            <div class="image">
                                                <img alt="image" class="img-responsive" src="{{ URL::asset('/image/p1.jpg') }}">
                                            </div>
                                            <div class="file-name">
                                                Document_2014.doc
                                                <br/>
                                                <small>添加时间：2014-10-13</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="file-box">
                                    <div class="file">
                                        <a href="file_manager.html#">
                                            <span class="corner"></span>

                                            <div class="image">
                                                <img alt="image" class="img-responsive" src="{{ URL::asset('/image/p1.jpg') }}">
                                            </div>
                                            <div class="file-name">
                                                Italy street.jpg
                                                <br/>
                                                <small>添加时间：2014-10-13</small>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="file-box">
                                    <div class="file">
                                        <a href="file_manager.html#">
                                            <span class="corner"></span>

                                            <div class="image">
                                                <img alt="image" class="img-responsive" src="{{ URL::asset('/image/p2.jpg') }}">
                                            </div>
                                            <div class="file-name">
                                                My feel.png
                                                <br/>
                                                <small>添加时间：2014-10-13</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="file-box">
                                    <div class="file">
                                        <a href="file_manager.html#">
                                            <span class="corner"></span>

                                            <div class="image">
                                                <img alt="image" class="img-responsive" src="{{ URL::asset('/image/p1.jpg') }}">
                                            </div>
                                            <div class="file-name">
                                                Michal Jackson.mp3
                                                <br/>
                                                <small>添加时间：2014-10-13</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ URL::asset('/js/photo/content.min.js') }}?v=1.0.0"></script>
    <script>
        $(document).ready(function() {
            $(".file-box").each(function(){
                animationHover(this,"pulse")
            });
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('/js/photo/stats.js') }}" charset="UTF-8"></script>
@endsection