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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">

    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>图片</th>
        <th>名称</th>
        <th width="10%">上传时间</th>
        <th width="310">操作</th>
      </tr>
        @foreach($image as $v)
            <tr>
                <td style="text-align:left; padding-left:20px;">{{$v['id']}}</td>
                <td width="10%"><img class="c-{{$v['id']}}" src="/image/upload/{{$v['name']}}" alt="" width="70" height="50" /></td>
                <td>{{$v['oriname']}}</td>
                <td>{{date('Y-m-d H:i:s', $v['time'])}}</td>
                <td>
                    <div class="button-group b-{{$v['id']}}">
                        @if($v['state']==0)
                            <a class="button border-red" href="javascript:fj({{$v['id']}})"><span class="icon-trash-o"></span> 封禁</a>
                        @else
                            <a class="button border-red" ><span class="icon-trash-o"></span> 已封禁</a>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
      </tr>
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
            url: '/image/fj',
            type: 'POSt',
            data:{
                'id':id
            },
            beforeSend: function() {
                load();
            },
            success: function(){
                commonMsg('封禁成功', 6);
                $('.c-'+id).attr('src', '/image/upload/weigui.jpg');
                $('.b-'+id).html('<a class="button border-red" ><span class="icon-trash-o"></span> 已封禁</a>');
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


//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>