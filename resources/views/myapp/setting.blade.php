@extends('layouts.base')

@section('title')
    设置
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/css/setting.css?v=3d3') }}">
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
                                <img src="{{ URL::asset('/image/upload/'.$user->image['name']) }}">
                                <i class="icon-camera left-1-userImg-change"></i>
                            </div>
                        </div>
                        <div class="left-1-name">
                            <ul>
                                <li>{{$user['name']}}</li>
                                <li>{{$set['zw']}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="left-2ttt">
                    <ul class="left-2ttt-ul">
                        <li class="check" vvv="personal-zl"><i class="icon-laptop"></i> &nbsp;&nbsp;个人资料 <arr></arr></li>
                        <li vvv="email-bell"><i class="icon-bell"></i> &nbsp;&nbsp;邮件通知 <arr></arr></li>
                        <li vvv="password-reset"><i class="icon-lemon"></i> &nbsp;&nbsp;密码 <arr></arr></li>
                        <li vvv="email-verity"><i class="icon-envelope-alt"></i> &nbsp;&nbsp;邮箱验证 <span>未验证</span><arr></arr></li>
                    </ul>
                </div>
            </div>

            <div class="right">
                <div class="personal-zl con-t" >
                    <div class="setting-main">
                        <div class="setting-main-head">
                            <h2>基本资料</h2>
                            <h3>修改你的基本信息和工作信息</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item">
                                <div class="label">
                                    用户名 *
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input name" value="{{$user['name']}}">
                                    <aside>也可以使用实名</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    性别
                                </div>
                                <div class="control">
                                    <input type="radio" name="setting-mian-sex" class="setting-mian-sex sex" value="1" <?php if($set['sex'] == 1){ ?>checked<?php } ?>> <span class="setting-main-sex-name">男</span>
                                    <input type="radio" name="setting-mian-sex" class="setting-mian-sex sex" value="0" <?php if($set['sex'] == 0){ ?>checked<?php } ?>> <span class="setting-main-sex-name">女</span>
                                    <input type="radio" name="setting-mian-sex" class="setting-mian-sex sex" value="2" <?php if($set['sex'] == 2){ ?>checked<?php } ?>> <span class="setting-main-sex-name">保密</span>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    手机
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input tel" value="{{$set['tel']}}">
                                    <aside>能联系到本来的常用联系方式</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    邮箱 *
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input email" value="{{$user['email']}}">
                                    <aside>个人常用的邮箱</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    公司
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input company" value="{{$set['company']}}">
                                    <aside>如果公司以独立产品为主，也可填写产品名称，比如：QQ空间、脉脉。</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    职位
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input zw" value="{{$set['zw']}}">
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
                                    <input type="text" class="setting-mian-input home" value="{{$set['home']}}">
                                    <aside>只需要填写省市，如江苏省泰州市，上海市等</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    大学
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input college" value="{{$set['college']}}">
                                    <aside>大学的名称，如北京大学</aside>
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    现居住地
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input jz" value="{{$set['jz']}}">
                                    <aside>现在居住的地方，填省市，如江苏省泰州市，上海市等</aside>
                                </div>
                            </div>
                        </div>

                        <div class="save-change">
                            <a href="javascript:changeUserInfo()">保存更改</a>
                        </div>
                    </div>
                </div>


                <div class="email-bell con-t" style="display: none">
                    <div class="setting-main">
                        <div class="setting-main-head">
                            <h2>邮件通知</h2>
                            <h3>控制是否接收我们向你发送的各类邮件</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人评论了我发表的说说
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_comment" class="cbx hidden comment_w" name="cbx" <?php if($notify['comment_w']){ ?>checked<?php } ?>>
                                    <label for="is_receive_mail_comment" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人赞了我的说说
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_reply" class="cbx hidden write_z" name="cbx" <?php if($notify['write_z']){ ?>checked<?php } ?>>
                                    <label for="is_receive_mail_reply" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人评论了我的文章
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_agree" class="cbx hidden comment_a" name="cbx" <?php if($notify['comment_a']){ ?>checked<?php } ?>>
                                    <label for="is_receive_mail_agree" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有点赞了我的文章
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_recommend" class="cbx hidden article_z" name="cbx" <?php if($notify['article_z']){ ?>checked<?php } ?>>
                                    <label for="is_receive_mail_recommend" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="setting-main-item line">
                                <div class="desc">
                                    有人请求添加我为好友
                                </div>
                                <div class="com_checkbox">
                                    <input type="checkbox" id="is_receive_mail_follow" class="cbx hidden friend" name="cbx" <?php if($notify['friend']){ ?>checked<?php } ?>>
                                    <label for="is_receive_mail_follow" class="lbl"><after></after></label>
                                </div>
                            </div>
                            <div class="save-change">
                                <a href="javascript:changeNotify()">保存更改</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="password-reset con-t" style="display: none">
                    <div class="setting-main">
                        <div class="setting-main-head">
                            <h2>修改密码</h2>
                            <h3>修改你的登录密码</h3>
                        </div>
                        <div class="setting-main-content">
                            <div class="setting-main-item">
                                <div class="label">
                                    旧密码
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input oldpass">
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    新密码
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input newpass">
                                </div>
                            </div>
                            <div class="setting-main-item">
                                <div class="label">
                                    确认新密码
                                </div>
                                <div class="control">
                                    <input type="text" class="setting-mian-input renewpass">
                                    <aside>我们将密码MD5加密后，截取部分存储在数据库中，请放心密码的安全问题。</aside>
                                </div>
                            </div>
                            <div class="save-change">
                                <a href="javascript:changePass()">保存更改</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="email-verity con-t" style="display: none">
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
                                    <span class="line no">未验证</span>
                                    <span class="btn remail">重发邮件</span>
                                    <aside>我们已向您的邮箱<span>{{$user['email']}}</span>发送了验证邮件，请通过邮件里的链接来进行验证。如果没有收到，可以稍后查收或到<span>垃圾箱</span>垃圾箱查看或重新发送邮件。 </aside>
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
    <script>
        $('.left-2ttt-ul').on('click', 'li', function(){
            if ($(this).hasClass('check')) {
                return;
            }
            $('.left-2ttt-ul').find('.check').removeClass('check');
            $(this).addClass('check');
            $('.con-t').css('display', 'none');
            $('.'+$(this).attr('vvv')).css('display', 'block');
        });

        var ajax = function(url, data){
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(){
                    layui.use(['layer'], function(){
                        var layer = layui.layer;
                        layer.closeAll('loading');
                        layer.alert('修改成功');
                    });
                },
                error: function(data){
                    data = eval('(' + data.responseText + ')');
                    layui.use(['layer'], function(){
                        var layer = layui.layer;
                        layer.closeAll('loading');
                        layer.alert(data['msg']);
                    });
                },
                beforeSend: function(){
                    load();
                }
            });
        };

        var load = function() {
            layui.use(['layer'], function(){
                var layer = layui.layer;
                layer.load(0, {shade: false});
            });
        };

        var changeUserInfo = function(){
            var data = {
              'name': $('.name').val(),
              'email': $('.email').val(),
              'zw': $('.zw').val(),
              'home': $('.home').val(),
              'tel': $('.tel').val(),
              'college': $('.college').val(),
              'company': $('.company').val(),
              'jz': $('.jz').val(),
              'sex': $('input:radio[name="setting-mian-sex"]:checked').val()
            };
            ajax('/set/info', data);
        };

        var changePass = function(){
            var oldpass = $('.oldpass').val();
            var newpass = $('.newpass').val();
            var renewpass = $('.renewpass').val();
            if (newpass != renewpass) {
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.msg('两次新密码不相同');
                });
                return;
            }
            var data = {
                'oldpass': oldpass,
                'newpass': newpass
            };
            ajax('/set/pass', data);
        };

        var changeNotify = function(){

            var data = {
                'comment_a': $('.comment_a').prop('checked')?1:0,
                'comment_w': $('.comment_w').prop('checked')?1:0,
                'article_z': $('.article_z').prop('checked')?1:0,
                'write_z': $('.write_z').prop('checked')?1:0,
                'friend': $('.friend').prop('checked')?1:0
            };
            ajax('/set/notify', data);
        }
    </script>
@endsection