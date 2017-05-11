var menuClick = function(id) {
    var element = $('#' + id);
    var menu = $('.' + id);
    var left = element.offset().left;
    var widthElement = element.width();
    var widthMenu = menu.width();
    menu.css('left', (left - widthMenu / 2 + widthElement / 2)+'px');
    $('.menu').css('display', 'none');
    menu.css('display', 'block');
};

var menuId = null;
$('.head-me').children('ul').children('li').children('strong').click(function() {
    var menu = $('.'+$(this).parent().attr('id'));
    if (menuId == $(this).parent().attr('id') && menu.css('display') == 'block') {
        menu.css('display', 'none');
        return;
    }
    menuId = $(this).parent().attr('id');
    menuClick(menuId);
});



layui.use('layim', function(layim){

    // websocket
    var ws = new WebSocket('ws://127.0.0.1:8282');
    // 链接成功时
    ws.onopen = function(){
        var uid = $('#userId').val();
        var msg = {'mine':{'id':uid},'to':{'type':'setuid'}};
        msg = JSON.stringify(msg);
        ws.send(msg);
    };
    //监听收到的消息
    ws.onmessage = function(res){
        res = eval("("+res.data+")");
        if(res.emit === 'chatMessage'){
            layim.getMessage(res.data); //res.data即你发送消息传递的数据（阅读：监听发送的消息）
        }
    };

    //基础配置
    layim.config({

        //初始化接口
        init: {
            url: '/json/getList.json'
            ,data: {}
        }


        //查看群员接口
        ,members: {
            url: 'json/getMembers.json'
            ,data: {}
        }

        //上传图片接口
        ,uploadImage: {
            url: '/upload/image' //（返回的数据格式见下文）
            ,type: '' //默认post
        }

        //上传文件接口
        ,uploadFile: {
            url: '/upload/file' //（返回的数据格式见下文）
            ,type: '' //默认post
        }

        //扩展工具栏
        ,tool: [{
            alias: 'code'
            ,title: '代码'
            ,icon: '&#xe64e;'
        }]

        // ,brief: true //是否简约模式（若开启则不显示主面板）

        ,title: '我的 Web IM' //自定义主面板最小化时的标题
        //,right: '100px' //主面板相对浏览器右侧距离
        //,minRight: '90px' //聊天面板最小化时相对浏览器右侧距离
        ,initSkin: '5.jpg' //1-5 设置初始背景
        //,skin: ['aaa.jpg'] //新增皮肤
        //,isfriend: false //是否开启好友
        ,isgroup: false //是否开启群组
        //,min: true //是否始终最小化主面板，默认false
        // ,notice: true //是否开启桌面消息提醒，默认false
        //,voice: false //声音提醒，默认开启，声音文件为：default.wav

        ,msgbox: layui.cache.dir + 'css/modules/layim/html/msgbox.html?v=3e12' //消息盒子页面地址，若不开启，剔除该项即可
        // ,find: layui.cache.dir + 'css/modules/layim/html/find.html' //发现页面地址，若不开启，剔除该项即可
        ,chatLog: layui.cache.dir + 'css/modules/layim/html/chatLog.html' //聊天记录页面地址，若不开启，剔除该项即可

    });

    /*
     layim.chat({
     name: '在线客服-小苍'
     ,type: 'kefu'
     ,avatar: 'http://tva3.sinaimg.cn/crop.0.0.180.180.180/7f5f6861jw1e8qgp5bmzyj2050050aa8.jpg'
     ,id: -1
     });
     layim.chat({
     name: '在线客服-心心'
     ,type: 'kefu'
     ,avatar: 'http://tva1.sinaimg.cn/crop.219.144.555.555.180/0068iARejw8esk724mra6j30rs0rstap.jpg'
     ,id: -2
     });
     layim.setChatMin();*/

    //监听在线状态的切换事件
    layim.on('online', function(data){
        //console.log(data);
    });

    //监听签名修改
    layim.on('sign', function(value){
        //console.log(value);
    });

    //监听自定义工具栏点击，以添加代码为例
    layim.on('tool(code)', function(insert){
        layer.prompt({
            title: '插入代码'
            ,formType: 2
            ,shade: 0
        }, function(text, index){
            layer.close(index);
            insert('[pre class=layui-code]' + text + '[/pre]'); //将内容插入到编辑器
        });
    });

    //监听layim建立就绪
    layim.on('ready', function(res){

        //console.log(res.mine);
        layim.msgbox(4);//模拟消息盒子有新消息，实际使用时，一般是动态获得

        //添加好友（如果检测到该socket）
        // layim.addList({
        //     type: 'group'
        //     ,avatar: "http://tva3.sinaimg.cn/crop.64.106.361.361.50/7181dbb3jw8evfbtem8edj20ci0dpq3a.jpg"
        //     ,groupname: 'Angular开发'
        //     ,id: "12333333"
        //     ,members: 0
        // });
        // layim.addList({
        //     type: 'friend'
        //     ,avatar: "http://tp2.sinaimg.cn/2386568184/180/40050524279/0"
        //     ,username: '冲田杏梨'
        //     ,groupid: 2
        //     ,id: "1233333312121212"
        //     ,remark: "本人冲田杏梨将结束AV女优的工作"
        // });
    });

    //监听发送消息
    layim.on('sendMessage', function(data){
        var To = data.to;
        console.log(data);

        // if(To.type === 'friend'){
        //     layim.setChatStatus('<span style="color:#FF5722;">对方正在输入。。。</span>');
        // }

        ws.send(JSON.stringify(data));
    });

    //监听查看群员
    layim.on('members', function(data){
        //console.log(data);
    });

    //监听聊天窗口的切换
    layim.on('chatChange', function(res){
        var type = res.data.type;
        console.log(res.data.id)
        if(type === 'friend'){
            //模拟标注好友状态
            //layim.setChatStatus('<span style="color:#FF5722;">在线</span>');
        } else if(type === 'group'){
            //模拟系统消息
            layim.getMessage({
                system: true
                ,id: res.data.id
                ,type: "group"
                ,content: '模拟群员'+(Math.random()*100|0) + '加入群聊'
            });
        }
    });
});

$('.ttt-friend').on('click', function(){
    $(this).addClass('on');
    $(this).siblings('div').removeClass('on');
    $('.nav_notify_list').css('display', 'none');
    $('.ttt-friend-flow').css('display', 'block');
});

$('.ttt-msg').on('click', function(){
    $(this).addClass('on');
    $(this).siblings('div').removeClass('on');
    $('.nav_notify_list').css('display', 'none');
    $('.ttt-msg-flow').css('display', 'block');
});


$('.ttt-friend-flow').on('mouseenter', '.ttt-add-friend', function(){
    //鼠标移入
    $(this).find('.yyy-fri').css('display','block');
}).on('mouseleave', '.ttt-add-friend', function(){
    //鼠标移出
    $(this).find('.yyy-fri').css('display','none');
});
