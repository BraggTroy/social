@extends('layouts.base')

@section('title')
    设置
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/setting.css') }}">
@endsection

@section('content')
    <div class="content-color">
        <div class="content">
            <div class="left">
                <div class="left-1">
                    <div class="left-1-backimg">
                        <img src="{{ URL::asset('/image/backimg') }}">
                        <i class="icon-camera left-1-backimg-change"></i>
                    </div>
                    <div class="left-1-userinfo">
                        <div class="left-1-userleft">
                            <div class="left-1-userImg">
                                <img src="{{ URL::asset('/image/user') }}">
                                <i class="icon-camera left-1-userImg-change"></i>
                            </div>
                        </div>
                        <div class="left-1-name">
                            <ul>
                                <li>txw1234</li>
                                <li>百度</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="left-2ttt">
                    <ul class="left-2ttt-ul">
                        <li><i class="icon-laptop"></i> &nbsp;&nbsp;个人资料 <arr></arr></li>
                        <li><i class="icon-bell"></i> &nbsp;&nbsp;邮件通知 <arr></arr></li>
                        <li><i class="icon-lemon"></i> &nbsp;&nbsp;密码 <arr></arr></li>
                        <li><i class="icon-envelope-alt"></i> &nbsp;&nbsp;邮箱验证 <span>未验证</span><arr></arr></li>
                    </ul>
                </div>
            </div>

            <div class="right">
                <div class="personal-zl" >
                    <div class="setting-main">
                        <div class="setting-main-head">
                            <h2>基本资料</h2>
                            <h3>修改你的基本信息和工作信息</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item">
                                <div class="label">
                                    用户名
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
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
                                    <input type="text" class="setting-mian-input">
                                    <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    邮箱
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                    <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    公司
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                    <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    职位
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                    <aside>如果是研发，建议填写研发方向，比如：大数据工程师、Android开发工程师。</aside>
                                </div>
                            </div>
                        </div>

                        <hr class="setting-hr">

                        <div class="setting-main-head">
                            <h2>更多信息</h2>
                            <h3>修改你的个性化信息和社会化信息</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item">
                                <div class="label">
                                    家乡
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                    <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    大学
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                    <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    现居住地
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                    <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                                </div>
                            </div>
                        </div>

                        <div class="save-change">
                            <a href="javascript:void(0)">保存更改</a>
                        </div>
                    </div>
                </div>


                <div class="email-bell" >
                    <div class="setting-main">
                        <div class="setting-main-head">
                            <h2>邮件通知</h2>
                            <h3>控制是否接收我们向你发送的各类邮件</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人评论了我发表的文章或最佳实践
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_comment" class="cbx hidden">
                                    <label for="is_receive_mail_comment" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人回复了我的评论或回复
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_reply" class="cbx hidden">
                                    <label for="is_receive_mail_reply" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人赞同了我的最佳实践
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_agree" class="cbx hidden">
                                    <label for="is_receive_mail_agree" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人推荐了我发表的文章或最佳实践
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_recommend" class="cbx hidden">
                                    <label for="is_receive_mail_recommend" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人关注了我
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_follow" class="cbx hidden">
                                    <label for="is_receive_mail_follow" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="save-change">
                                <a href="javascript:void(0)">保存更改</a>
                            </div>
                        </div>
                </div>

                <div class="password-reset" >
                    <div class="setting-main">
                        <div class="setting-main-head">
                            <h2>基本资料</h2>
                            <h3>修改你的基本信息和工作信息</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item">
                                <div class="label">
                                    旧密码
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    新密码
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    确认新密码
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input">
                                    <aside>我们将密码MD5加密后，截取前16位存储在数据库中，请放心密码的安全问题。</aside>
                                </div>
                            </div>
                            <div class="save-change">
                                <a href="javascript:void(0)">保存更改</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="email-verity" >
                    <div class="setting-main">
                        <div class="setting-main-head">
                            <h2>邮箱验证</h2>
                            <h3>验证你的邮箱地址</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item">
                                <div class="label">
                                    当前邮箱状态
                                </div>
                                <div class="control">
                                    <span class="line no">为验证</span>
                                    <span class="btn remail">重发邮件</span>
                                    <aside>我们已向您的邮箱<span>1729701509@qq.com</span>发送了验证邮件，请通过邮件里的链接来进行验证。如果没有收到，可以稍后查收或到<span>垃圾箱</span>垃圾箱查看或重新发送邮件。 </aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    验证后可使用的功能
                                </div>
                                <div class="control">
                                    <li>撰写说说</li>
                                    <li>撰写文章</li>
                                    <li>添加评论</li>
                                    <li>添加回复</li>
                                    <li>向用户发私信</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection