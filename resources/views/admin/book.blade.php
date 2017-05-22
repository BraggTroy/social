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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      {{--<ul class="search">--}}
        {{--<li>--}}
          {{--<button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>--}}
          {{--<button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>--}}
        {{--</li>--}}
      {{--</ul>--}}
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>住址</th>
        <th width="25%">签名</th>
        <th>操作</th>       
      </tr>
        @foreach($user as $v)
          <tr>
            <td>{{ $v['id'] }}</td>
            <td>{{$v['name']}}</td>
            <td>{{ $v->set['tel'] }}</td>
            <td>{{ $v['email'] }}</td>
            <td>{{ $v->set['zj'] }}</td>
            <td>{{ $v['sign'] }}</td>
            <td><div class="button-group b-{{$v['id']}}">
                    @if($v['statee'] == 0)
                    <a class="button border-red" href="javascript:fj({{$v['id']}})" ><span class="icon-trash-o"></span> 封禁</a>
              @else
                  <a class="button bg-blue" href="javascript:jj({{$v['id']}})" ><span class="icon-trash-o"></span> 解禁</a>
                  @endif
                </div></td>
          </tr>
        @endforeach
      {{--<tr>--}}
        {{--<td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>--}}
      {{--</tr>--}}
    </table>
  </div>
</form>
<script type="text/javascript">
    var load = function() {
        layui.use(['layer'], function(){
            var layer = layui.layer;
            layer.load(0, {shade: false});
        });
    };
var fj = function(id){
    $.ajax({
        url: '/user/fj',
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
        url: '/user/fj',
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
}

var commonMsg = function(str, i) {
    layui.use(['layer'], function(){
        var layer = layui.layer;
        layer.msg(str, {time: 2000, icon:i});
    });
};

</script>
</body></html>