<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
  <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
  <link rel="stylesheet" href="/css/admin/pintuer.css">
  <link rel="stylesheet" href="/css/admin/admin.css">
  <script src="/js/admin/jquery.js"></script>
  <script src="/js/admin/pintuer.js"></script>
  <script src="{{ URL::asset('/layui/layui.js') }}"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  {{--<div class="padding border-bottom">--}}
    {{--<button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加分类</button>--}}
  {{--</div>--}}
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">作者</th>
      <th width="10%">发布时间</th>
      <th width="10%">操作</th>
    </tr>
    @foreach($fen as $v)
    <tr>
      <td>{{$v['id']}}</td>
      <td>{{$v->user['name']}}</td>
      <td>{{date('Y-m-d H:i:s', $v['time'])}}</td>
      <td>
        <div class="button-group ">
          <a class="button border-main" href="javascript:showWrite('/admin/write/show/{{$v['id']}}')"><span class="icon-edit"></span> 查看</a>
          <ttt class="b-{{$v['id']}}">
            @if($v['state'] == 0)
              <a class="button border-red" href="javascript:fj({{$v['id']}})" ><span class="icon-trash-o"></span> 封禁</a>
            @else
              <a class="button bg-blue" href="javascript:jj({{$v['id']}})" ><span class="icon-trash-o"></span> 解禁</a>
            @endif
          </ttt>
        </div>
      </td>
    </tr>
    @endforeach
    {{--<tr>--}}
      {{--<td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>--}}
    {{--</tr>--}}
  </table>
</div>
<script type="text/javascript">
    var load = function() {
        layui.use(['layer'], function(){
            var layer = layui.layer;
            layer.load(0, {shade: false});
        });
    };
    var fj = function(id){
        $.ajax({
            url: '/write/fj',
            type: 'POST',
            data: {
                'id': id
            },
            beforeSend: function() {
                load();
            },
            success: function(){
                commonMsg('封禁成功', 6);
                $('.b-'+id).html('<a class="button bg-blue" href="javascript:jj('+id+')" ><span class="icon-trash-o"></span> 解禁</a> ');
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.closeAll('loading');
                });
            }
        })
    };

    var jj = function(id){
        $.ajax({
            url: '/write/fj',
            type: 'POST',
            data: {
                'id': id
            },
            beforeSend: function() {
                load();
            },
            success: function(){
                commonMsg('解禁成功', 6);
                $('.b-'+id).html('<a class="button border-red" href="javascript:fj('+id+')" ><span class="icon-trash-o"></span> 封禁</a> ');
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.closeAll('loading');
                });
            }
        })
    };

    var commonMsg = function(str, i) {
        layui.use(['layer'], function(){
            var layer = layui.layer;
            layer.msg(str, {time: 2000, icon:i});
        });
    };
var showWrite = function(lianjie){
    layui.use('layer', function() {
        var layer = layui.layer;
        layer.open({
            type: 2,
            title: '说说',
            area: ['800px', '500px'],
            fixed: false, //不固定
            maxmin: true,
            content: lianjie
        });
    });
};
</script>
</body>
</html>