<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="/css/admin/pintuer.css">
    <link rel="stylesheet" href="/css/admin/admin.css?v=0">
    <script src="/js/admin/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="/index" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="/admin/logout"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">  
    <li><a href="/admin/book" target="right" class="on"><span class="icon-caret-right"></span>用户管理</a></li>
    <li><a href="/admin/column" target="right"><span class="icon-caret-right"></span>文章管理</a></li>
    <li><a href="/admin/list" target="right"><span class="icon-caret-right"></span>图片管理</a></li>
    <li><a href="/admin/cate" target="right"><span class="icon-caret-right"></span>分享管理</a></li>
  </ul>   
  <!-- <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
           
  </ul>  --> 
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="/admin/index" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">用户管理</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="/admin/book" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">

</div>
</body>
</html>