@extends('layouts.base')

@section('title')
    title
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/article_detail.css') }}">
@endsection

@section('content')
    <div class="content-color">
        <div class="content">
            <div class="left-content">
                <div class="content-head">
                    <div class="content-head-title">
                        <h1>一个nodeJs 项目搭建的最佳实践</h1>
                    </div>
                    <div class="content-head-label">
                        <span>handlebars</span>
                    </div>
                    <div class="content-head-write">
                        <a href=""><i class="icon-file-alt"></i> 提交文章</a>
                    </div>
                </div>
                <div class="content-main">
                    <div class="content-main-article">
                        ff
                    </div>
                    <div class="content-main-zz">
                        <span>文章转载至www.bababa.xmk/44=ee</span>
                    </div>
                </div>


                <div class="content-comment">
                    <header id="section-comment" class="section-header">
                        讨论区
                        <span>(请尽量讨论和主题相关的话题)</span>

                        <div class="content_comment_create_btn">
                            <span>发表评论</span>
                        </div>
                    </header>

                    <div class="content_comments">
                        <div class="content_comment">
                            <a class="content_comment_avatar" href="">
                                <img src="{{ URL::asset('image/user') }}">
                            </a>
                            <div class="content_comment_user">
                                <a class="tra_color_bg" href="">momo</a>
                                <span>TalkingData前端开发</span>
                            </div>
                            <div class="content_comment_time">
                                <i class="iconfont icon-time"></i>
                                <span>2016-05-10 17:07</span>
                            </div>
                            <div class="content_comment_ctrl">
                                <li>
                                    <i class="icon-comment-alt"></i>
                                    <span>回复</span>
                                </li>
                            </div>
                            <div class="content_comment_detail">
                                编译之后的物理文件md5值管理，更完美了
                            </div>

                            {{--回复评论--}}
                            <div class="content_replies on">
                                <div class="content_reply">
                                    <div class="content_reply_user">
                                        <a class="content_reply_user_avatar" href="/aresn">
                                            <img src="{{ URL::asset('/image/user') }}">
                                        </a>
                                        <a class="content_reply_user_name tra_color_bg" href="/aresn">Aresn</a>
                                        <span>回复</span>
                                        <a class="content_reply_user_avatar" href="">
                                            <img src="{{ URL::asset('/image/user') }}">
                                        </a>
                                        <a class="content_reply_user_name tra_color_bg" href="">momo</a>
                                    </div>
                                    <div class="content_reply_detail">是啊</div>
                                    <div class="content_reply_time">
                                        <i class="iconfont icon-time"></i>
                                        <span>2016-05-16 10:39</span>
                                    </div>
                                    <div class="content_reply_ctrl">
                                        <li>
                                            <i class="icon-comment-alt"></i>
                                            <span>回复</span>
                                        </li>
                                    </div>
                                </div>
                            </div>

                            {{--回复--}}
                            <div class="content_reply_create" style="display: none;">
                                <div class="content_reply_create_avatar">
                                    <img src="https://o5wwk8baw.qnssl.com/static/image/avatar_default/avatar">
                                </div>
                                <div class="content_reply_create_user">
                                    回复<span></span>
                                </div>
                                <div class="content_reply_create_fm">
                                    <textarea placeholder="写下你的回复..."></textarea>
                                    <div class="btn btn_inline off">
                                        <i class="glyphicon glyphicon-send"></i>
                                        <span>发表回复</span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        {{--回复--}}
                        <div class="content_comment_create">
                            <div class="content_comment_create_avatar">
                                <img src="https://o5wwk8baw.qnssl.com/static/image/avatar_default/avatar">
                            </div>
                            <div class="content_comment_create_user">
                                txw434343<span>百度</span><span>php</span>
                            </div>
                            <div class="content_comment_create_fm">
                                <textarea placeholder="写下你的评论..."></textarea>
                                <div class="btn btn_inline off">
                                    <i class="glyphicon glyphicon-send"></i>
                                    <span>发表评论</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-content">
                <div class="right-head">
                    <a href="" class="content_info_avatar">
                        <img src="{{ URL::asset('image/user') }}">
                    </a>
                    <div class="right-head-name">
                        <a href="">
                            txw
                            <i class="icon-external-link"></i>
                            <span>{作者}</span>
                        </a>
                    </div>
                    <div class="right-head-zhiwei">
                        <span>百度 php工程死</span>
                    </div>
                    <div class="right-head-follow">
                        <span class="personal-add-attention">关注</span>
                    </div>
                </div>

                <div class="right-main">
                    <ul>
                        <li>
                            <table>
                                <tr><td><span>5</span></td></tr>
                                <tr><td><span>赞成</span></td></tr>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr><td><span>5</span></td></tr>
                                <tr><td><span>收藏</span></td></tr>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr><td><span>5</span></td></tr>
                                <tr><td><span>反对</span></td></tr>
                            </table>
                        </li>
                    </ul>
                    <div class="submit-time">
                        <span class="right-main-time"><i class="icon-time"></i> &nbsp;2016-11-12 15:54 &nbsp;发布</span>
                    </div>
                </div>

                <div class="right-action">
                    <ul>
                        <li><span><i class="icon-angle-up"></i> 赞成</span></li>
                        <li><span><i class="icon-angle-down"></i> 反对</span></li>
                        <li><span><i class="icon-heart-empty"></i> 收藏</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection