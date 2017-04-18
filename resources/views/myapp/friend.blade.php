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
                                    <a href="file_manager.html#" class="file-control ">所有好友</a>
                                    <div class="hr-line-dashed"></div>
                                    <button class="btn btn-primary btn-block" onclick="showAlert()">新建分组</button>
                                    <div class="hr-line-dashed"></div>
                                    <h5>好友分组</h5>
                                    <ul class="folder-list" style="padding: 0">
                                        <?php
                                            $f = new \App\Http\Controllers\Action\FriendController();
                                            $group = $f->getGroupByUser(session('user'));
                                        ?>
                                        @foreach($group as $v)
                                        <li class="folder-item-list">
                                            <a href="/friend/show/{{$v['id']}}">
                                                <i class="fa fa-folder"></i> {{$v['name']}}
                                            </a>
                                            <span class="album-del" style="float: right;position: relative;top: -20px;font-size: 10px;color: #dadada;display: none;cursor: pointer" onclick="delGroup(this,'{{$v['id']}}')">删除</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 animated fadeInRight">
                        <div class="row">
                            <div class="col-sm-12 friend">
                                @foreach($friend as $v)
                                            <div class="contact-box friend-list friend-list{{$v['id']}}" style="padding-right: 0;margin-right: 20px;padding-left: 0;width: 31%;float: left">
                                                <a href="">
                                                    <div class="col-sm-4">
                                                        <div class="text-center">
                                                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{URL::asset('/image/upload/'.$v->user->image['name'])}}">
                                                            <div class="m-t-xs font-bold"></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="col-sm-8">
                                                    <i style="position: absolute;right: 13px;top: -8px;cursor: pointer;display: none" class="icon-trash delfriend" onclick="delFriend(this, '{{$v['userId']}}','{{$v['friendId']}}')"></i>
                                                    <a href="">
                                                        <h3><strong class="t-user-name">{{$v['nickname']}}</strong></h3>
                                                    </a>
                                                        {{--<p><i class="fa fa-map-marker"></i> 甘肃·兰州</p>--}}
                                                    <p>分组：{{$v->group['name']}}</p>
                                                    <a href="javascript:changName( {{$v['id']}})" style="color: #C7C1DE">修改备注</a> &nbsp;&nbsp;
                                                    <a href="javascript:moveGroup({{$v['id']}})" style="color: #C7C1DE">移动分组</a>
                                                </div>
                                                <div class="clearfix"></div>
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
        $(document).ready(function() {
            $(".file-box").each(function(){
                animationHover(this,"pulse")
            });
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('/js/photo/stats.js') }}" charset="UTF-8"></script>
    <script>
        $('.friend-list').mouseenter(function(){
            //鼠标移入
            $(this).find('.delfriend').css('display','block');
        }).mouseleave(function(){
            //鼠标移出
            $(this).find('.delfriend').css('display','none');
        });

        var showAlert = function() {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.prompt({title: '请输入分组名'}, function(val, index){
                    $.ajax({
                        url: '/friendgroup/add',
                        type: 'POST',
                        data: {
                            'content': val
                        },
                        beforeSend: function(){
                            load();
                        },
                        success: function(data) {
                            $('.folder-list').append('<li class="folder-item-list"><a href="/friend/show/'+data+'"><i class="fa fa-folder"></i> '+val+'</a><span class="album-del" style="float: right;position: relative;top: -20px;font-size: 10px;color: #dadada;display: none;cursor: pointer" onclick="delGroup(this,'+data+')">删除</span></li>');
                            layer.closeAll('loading');
                        }
                    });
                    layer.close(index);
                });
            });
        };

        var delGroup = function(elem, id){
            $.ajax({
                url: '/friendgroup/del',
                type: 'post',
                data: {
                    'id':id
                },
                beforeSend: function(){
                    load();
                },
                success: function(){
                    layui.use(['layer'], function() {
                        var layer = layui.layer;
                        layer.msg('删除成功');
                        $(elem).parent().remove();
                        layer.closeAll('loading');
                    });
                },
                error: function(data){
                    data = eval('(' + data.responseText + ')');
                    layui.use(['layer'], function() {
                        var layer = layui.layer;
                        layer.msg(data['msg']);
                        layer.closeAll('loading');
                    });
                }
            });
        };

        $('.folder-list').on('mouseenter','.folder-item-list', function(){
            $(this).find('.album-del').css('display','block');
        }).on('mouseleave', '.folder-item-list', function(){
            $(this).find('.album-del').css('display','none');
        });

        var changName = function(id){
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.prompt({title: '新的昵称'}, function(val, index){
                    $.ajax({
                        url: '/friend/changename',
                        type: 'POST',
                        data: {
                            'content': val,
                            'id': id
                        },
                        beforeSend: function(){
                            load();
                        },
                        success: function() {
                            $('.friend-list'+id).parent().find('.t-user-name').html(val);
                            layer.msg('修改成功');
                            layer.closeAll('loading');
                        },
                        error: function(data) {
                            data = eval('(' + data.responseText + ')');
                            layer.msg(data['msg']);
                            layer.closeAll('loading');
                        }
                    });
                    layer.close(index);
                });
            });
        };

        var moveGroup = function($id){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['420px', 'auto'], //宽高
                content: '<center><?php
                    $f = new \App\Http\Controllers\Action\FriendController();
                    $group = $f->getGroupByUser(session('user'));
                    echo '<div class="dropdown" style="float: left;"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" value="'.$group[0]['id'].'">';
                    echo $group[0]['name'];
                    echo '<span class="caret"></span></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';
                    foreach ($group as $v){
                        echo '<li><a href="#" value="'.$v['id'].'">'.$v['name'].'</a></li>';
                    }
                    echo '</ul></div>';
                ?></center>',
                btn: ['确定','取消']
            }, function() {

            });
        };

        var delFriend = function(elem, $uid, $fid){
            layui.use(['layer'], function() {
                layer.confirm('删除后你将从对方好友中删除', {
                    title: '确定删除该好友',
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        url: '/friend/del',
                        type: 'post',
                        data: {
                            'uid': $uid,
                            'fid': $fid
                        },
                        success: function(){
                            layer.msg('删除成功');
                            $(elem).parent().parent().remove();
                            layer.closeAll('loading');
                        },
                        beforeSend: function(){
                            load();
                        }
                    });
                });
            });
        };

        var load = function() {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.load(0, {shade: false});
            });
        };
    </script>
@endsection