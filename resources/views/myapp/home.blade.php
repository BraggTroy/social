@extends('layouts.base')

@section('title')
    个人主页
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/home.css?v=6') }}">
@endsection

@section('content')
    <div class="content">
        <div class="personal-detail">
            <div class="person-img">
                <img src="{{ URL::asset('/image/user') }}">
                <a href="" class="personal-add-attention">关注</a>
            </div>
            <div class="personal-name">
                <h1>txw87378</h1>
            </div>
            <div class="personal-desc">
                <span class="pf">1 篇说说</span>
                <span class="pf">2 篇日志</span>
                <span class="pf pffs pff">3 个粉丝</span>
                <span class="pf pfgz pff">4 个关注</span>
            </div>
        </div>

        <div class="home-nav">
            <div class="ttt-nav">
                <ul class="layui-nav">
                    <li class="layui-nav-item layui-this"><a href="">文章</a></li>
                    <li class="layui-nav-item"><a href="">说说</a></li>
                    <li class="layui-nav-item"><a href="">个人信息</a></li>
                </ul>
            </div>
        </div>


        <div class="content-all">
            <div class="content-list article-content" style="display: none">
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

            <div class="content-list write-content" style="display: none">
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
                    </div>
                </div>
            </div>


            <div class="personal-zl" style="width: 60%;padding-top: 20px;margin-left: 20%;">
                <div class="setting-main">
                    <div class="setting-main-head">
                        <h2>基本资料</h2>
                        <h3>基本信息和工作信息</h3>
                    </div>
                    <div class="setting-main-content">
                        <div class="setting-main-item">
                            <div class="label">
                                用户名
                            </div>
                            <div class="control">
                                <aside>也可以使用实名</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                性别
                            </div>
                            <div class="control">
                                <input type="radio" name="setting-mian-sex" class="setting-mian-sex"> <span class="setting-main-sex-name">男</span>
                                <input type="radio" name="setting-mian-sex" class="setting-mian-sex"> <span class="setting-main-sex-name">女</span>
                                <input type="radio" name="setting-mian-sex" class="setting-mian-sex"> <span class="setting-main-sex-name">保密</span>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                手机
                            </div>
                            <div class="control">
                                <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                邮箱
                            </div>
                            <div class="control">
                                <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                公司
                            </div>
                            <div class="control">
                                <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                职位
                            </div>
                            <div class="control">
                                <aside>如果是研发，建议填写研发方向，比如：大数据工程师、Android开发工程师。</aside>
                            </div>
                        </div>
                    </div>

                    <hr class="setting-hr">

                    <div class="setting-main-head">
                        <h2>更多信息</h2>
                        <h3>个性化信息和社会化信息</h3>
                    </div>
                    <div class="setting-main-content">
                        <div class="setting-main-item">
                            <div class="label">
                                家乡
                            </div>
                            <div class="control">
                                <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                大学
                            </div>
                            <div class="control">
                                <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                            </div>
                        </div>
                        <div class="setting-main-item">
                            <div class="label">
                                现居住地
                            </div>
                            <div class="control">
                                <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(window).scroll(function(event){

        });

        layui.use('element', function(){
            var element = layui.element();
            element.on('nav(demo)', function(elem){
                layer.msg(elem.text());
            });
        });
    </script>
@endsection