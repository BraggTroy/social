@extends('layouts.base')

@section('title')
    我的相册
@endsection

@section('css')
    <link href="{{ URL::asset('/css/photo/font-awesome.min93e3.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/photo/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/photo/style.min862f.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/css/photo/photo.css?v=43') }}">
    <link rel="stylesheet" href="{{ URL::asset('/fineuploader/fine-uploader-gallery.css') }}">
@endsection

@section('content')
    @include('template.uploader')
    <div class="content-all">
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
                        <div style="float: left;margin-top: 10px;">上传的相册：</div>
                        <div class="dropdown" style="float: left;">
                            <?php
                                $photo = new \App\Http\Controllers\Action\PhotoController();
                                $xc = $photo->getAlbum(session('user'));
                            ?>
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" value="{{$xc[0]['id']}}">
                                {{$xc[0]['name']}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                @foreach($xc as $v)
                                    <li><a href="#" value="{{$v['id']}}">{{$v['name']}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <button type="button" class="btn btn-default" data-dismiss="modal">完成</button>
                    </div>
                </div>
            </div>
        </div>

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
                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">上传文件</button>
                                    <div class="hr-line-dashed"></div>
                                    <h5>相册 <a href="javascript:showAlert()" style="float:right;">新建相册</a></h5>
                                    <ul class="folder-list" style="padding: 0">
                                        @foreach($xc as $v)
                                            <li class="folder-item-list">
                                                <a href=""><i class="fa fa-folder"></i> {{$v['name']}}</a>
                                                <span class="album-del" style="float: right;position: relative;top: -20px;font-size: 10px;color: #dadada;display: none;cursor: pointer" onclick="delAlbum(this, '{{$v['id']}}')">删除</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <h5 class="tag-title">标签</h5>
                                    <ul class="tag-list" style="padding: 0">
                                        <li>
                                            <a href="">爱人</a>
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
                                @foreach($image as $v)
                                <div class="file-box">
                                    <div class="file">
                                        <a href="file_manager.html#">
                                            <span class="corner"></span>

                                            <div class="image">
                                                <img alt="image" class="img-responsive" src="{{ URL::asset('/image/upload/'.$v['name']) }}">
                                            </div>
                                            <div class="file-name" style="overflow: hidden">
                                                {{ $v['oriname'] }}
                                                <br/>
                                                <small>添加时间：{{ date('Y-m-d', $v['time']) }}</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
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
        $(document).ready(function(){$(".file-box").each(function(){animationHover(this,"pulse")})});
    </script>
    <script type="text/javascript" src="{{ URL::asset('/js/photo/stats.js') }}" charset="UTF-8"></script>
    <script src="{{ URL::asset('/fineuploader/jquery.fine-uploader.js?v=1') }}"></script>
    <script>
        var image = [], num = 0;
        $('#fine-uploader-s3').fineUploader({
            template: 'qq-template-s3',
            request: {
                endpoint: "/uploadPhoto",
                params: {
                    'album' : $('.dropdown-toggle').attr('value')
                }
            },
            cors: {
                expected: true
            },
            chunking: {
                enabled: true
            },
            resume: {
                enabled: true
            },
            deleteFile: {
                enabled: true,
                method: 'POST',
                endpoint: "/delPhoto",
                params: {

                }
            },
            validation: {
                itemLimit: 5,
                sizeLimit: 15000000
            },
            thumbnails: {
                placeholders: {
                    notAvailablePath: "/fineuploader/placeholders/not_available-generic.png",
                    waitingPath: "/fineuploader/placeholders/waiting-generic.png"
                }
            },
            callbacks: {
                onComplete: function(id, name, response) {
                    var previewLink = qq(this.getItemByFileId(id)).getByClass('preview-link')[0];
                    if (response.success) {
                        previewLink.setAttribute("href", "/image/upload/"+response.newUuid);
                    }
                }
            }
        });

        $('.dropdown-menu li a').click(function(){
            $('.dropdown-toggle').attr('value', $(this).attr('value')).html($(this).html()+' <span class="caret"></span>');
        });

        var showAlert = function() {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.prompt({title: '请输入相册名'}, function(val, index){
                    $.ajax({
                        url: '/album/add',
                        type: 'POST',
                        data: {
                            'content': val
                        },
                        success: function(data) {
                            $('.folder-list').append('<li class="folder-item-list"><a href=""><i class="fa fa-folder"></i> '+val+'</a></li><span class="album-del" style="float: right;position: relative;top: -20px;font-size: 10px;color: #dadada;display: none;cursor: pointer" onclick="delAlbum(this,'+data+')">删除</span>');
                        }
                    });
                    layer.close(index);
                });
            });
        };

        var delAlbum = function(elem, id) {
            $.ajax({
                url: '/album/del',
                type: 'post',
                data: {
                    'id':id
                },
                success: function(){
                    layui.use(['layer'], function() {
                        var layer = layui.layer;
                        layer.msg('删除成功');
                        $(elem).parents().remove();
                    });
                },
                error: function(data){
                    data = eval('(' + data.responseText + ')');
                    layui.use(['layer'], function() {
                        var layer = layui.layer;
                        layer.msg(data['msg']);
                    });
                }
            });
        }


        $('.folder-item-list').mouseenter(function(){
            //鼠标移入
            $(this).find('.album-del').css('display','block');
        }).mouseleave(function(){
            //鼠标移出
            $(this).find('.album-del').css('display','none');
        });


    </script>
@endsection