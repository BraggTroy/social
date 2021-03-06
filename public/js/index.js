
var seeElement =  $('.write-article .after-footer .after-drop');
seeElement.children('button').click(function() {
    var show = seeElement.children('ul').css('display');
    if (show == 'block') {
        seeElement.children('ul').css('display', 'none');
        return;
    }
    seeElement.children('ul').css('display', 'block');
});


var canSee = function(parentElem, childElem) {
    var left = parentElem.offset().left;
    var top = parentElem.offset().top;
    var height = parentElem.height();
    childElem.css('left', left + 'px').css('top', (top + height) + 'px');
};

var showWriteArticle = function() {
    var elem = $('.write-article');
    if (elem.css('display') == 'none') {
        elem.css('display', 'block');
        return;
    }
    elem.css('display', 'none');
};

var elemShow = function(_class) {
    var elem = $("." + _class);
    if(elem.css('display') == 'block') {
        elem.css('display', 'none');
    }else {
        elem.css('display', 'block');
    }
};

var choiceShow = function(elem) {
    $('.middle .after-footer .btn .btn-name').html($(elem).html()+'&nbsp;');
    $('.middle .after-footer .btn .btn-name').attr('value', $(elem).attr('value'));
    seeElement.children('ul').css('display', 'none');
};

var wordNum = function(elem){
    $('.text_num').html(elem.length);
    if (elem.length > 240) {
        commonMsg('超出字数限制啦，快删掉点', 5);
        $('.middle .write-article .after-ok')
            .css('backgroundColor', '#eee')
            .css('color', '#999')
            .css('cursor', '');
        return;
    }
    if(elem.length > 0) {
        $('.middle .write-article .after-ok')
            .css('backgroundColor', '#34bf49')
            .css('color', '#fff')
            .css('cursor','pointer');
    }else {
        $('.middle .write-article .after-ok')
            .css('backgroundColor', '#eee')
            .css('color', '#999')
            .css('cursor', '');
    }
};

var submitWrite = function(){
    var len = $('.middle .write-article .article-input').val().length;
    if(len > 0 && len <= 240){
        var img = image.join('/');
        $.ajax({
            type: 'POST',
            url: '/submit/write',
            data: {
                'content': $('.middle .write-article .article-input').val(),
                'see': $('.middle .after-footer .btn .btn-name').attr('value'),
                '_token' : $('#token').val(),
                'image' : img
            },
            success: function(date) {
                commonMsg('发表成功', 6);
                $('.middle .write-article').css('display', 'none');
                location.replace(location.href);
            },
            error: function(data) {
                commonMsg('哎呀，发表失败啦', 5);
                $('.middle .write-article').css('display', 'none');
                $('.middle .write-article .article-input').val('');
                $('#showImage div').html('');
                $('#showImage div').hide();
            }
        });
    }
};

var submitComment = function(id, name, image) {
    var content = $('.write' + id).val();
    $.ajax({
        type: "POST",
        url: "/comment/write",
        data: {
            'content': content,
            'id' : id,
            'parent': 0
        },
        beforeSend: function() {
            load();
        },
        success: function(data){
            commonMsg('发表成功', 6);
            data = eval("("+data+")");
            var h = '<div class="comment-item">'+
                '<a href=""><img src="/image/upload/'+image+'"></a>'+
                '<div class="comment-content">'+
                '<ul>'+
                "<li>"+ name + ' ' +
                data['time']+
                "<span class='res res"+data['id']+"' onclick='reComment("+id+","+data['id']+")'>回复</span></li>"+
                "<li>"+content+"</li></ul></div></div>";
            $('.comment').append(h);
        },
        error: function(){
            commonMsg('哎呀，发表失败啦', 5);
        },
        complete: function() {
            $('.comment-input-detial'+id).hide();
            $('.input-show'+id).show();
            $('.write' + id).val('');
            //关闭加载层
            layer.closeAll('loading');
        }
    });
};


var showComment = function(elem){
    $(elem).siblings('div').show();
    $(elem).siblings('div').children('textarea').focus();
    // $('.comment-input-detial').show();
    $(elem).hide();
};

var hideComment = function(elem) {

};

//layer弹出框
var commonMsg = function(str, i) {
    layui.use(['layer'], function(){
        var layer = layui.layer;
        layer.msg(str, {time: 2000, icon:i});
    });
};

var load = function() {
    layui.use(['layer'], function(){
        var layer = layui.layer;
        layer.load(0, {shade: false});
    });
};


//图片缩放
var resize = function(elem, limit){
    elem.each(function(){
        var e = this;
        var image = new Image();
        image.src = this.src;
        image.onload = function(){
            if (this.width >= this.height) {
                if(this.width > limit) {
                    $(e).attr('width',limit);
                    $(e).attr('height',limit / this.width * this.height);
                }
            }else {
                if(this.height > limit) {
                    $(e).attr('height',limit);
                    $(e).attr('width',limit / this.height * this.width);
                }
            }
        };
    });
};


var cancelComment = function(elem) {
    console.log(444);
        $('.input-show').show();
        $('.input-show').siblings('div').hide();
};
// $('.middle').on('blur', '.article', function(){
//     cancelComment();
// });

$('.comment').on('mouseenter', '.comment-item', function(){
    //鼠标移入
    $(this).find('.res').css('display','block');
}).on('mouseleave', '.comment-item', function(){
    //鼠标移出
    $(this).find('.res').css('display','none');
});


var reComment = function(wid, cid, name, image){
    $('.input-show'+wid).hide();
    $('.comment-input-detial'+wid).hide();
    $('.comment-re-input-detial'+wid).remove();
    $('.comment-input'+wid).append(
        "<div class='comment-input-detial comment-re-input-detial"+wid+"'>" +
        "<textarea class='write rewrite"+wid+"' ></textarea>" +
        "<div class='f-bottom'>" +
        "<span><i class=''></i></span>" +
        "<span class='cancle-write' onclick='cancelReWrite("+wid+")'>取消</span>" +
        "<a href=\"javascript:submitReComment("+wid+","+cid+",'"+name+"','"+image+"')\" class='submit' ><i class='glyphicon glyphicon-send'></i>&nbsp;发布</a></div></div>"
    );
};

var cancelReWrite = function(id){
    $('.comment-re-input-detial' + id).remove();
    $('.input-show'+id).show();
};

var submitReComment = function(wid, cid, name, image){
    var content = $('.rewrite' + wid).val();
    $.ajax({
        url: "/comment/write",
        type: "POST",
        data: {
            'content': content,
            'id' : wid,
            'parent': cid
        },
        beforeSend: function() {
            load();
        },
        success: function(data){
            commonMsg('发表成功', 6);
            data = eval("("+data+")");
            var rp = '';
            if (data['reuser']) {
                rp = ' 回复 ' + data['reuser'] + ' ';
            }
            var h = '<div class="comment-item">'+
                '<a href=""><img src="/image/upload/'+image+'"></a>'+
                '<div class="comment-content">'+
                '<ul>'+
                "<li>"+ name + rp +
                data['time']+
                "<span class='res res"+data['id']+"' onclick='reComment("+wid+","+data['id']+")'>回复</span></li>"+
                "<li>"+content+"</li></ul></div></div>";
            $('.comment').append(h);
        },
        error: function(){
            commonMsg('哎呀，发表失败啦', 5);
        },
        complete: function() {
            $('.comment-re-input-detial'+wid).remove();
            $('.input-show'+wid).show();
            //关闭加载层
            layer.closeAll('loading');
        }
    });
};

var dianzan = function(writeId,userId,imgname){

    $.ajax({
        url: '/write/zan',
        type: "POST",
        data: {
            'writeId' : writeId
        },
        success: function(data) {
            if (data == 1 ) {
                $('#tttz'+writeId).html('<i style="color: red" class="glyphicon glyphicon-thumbs-up"></i>&nbsp;取消赞');
                $('.imagezan'+writeId).append("<a id='imgzan"+userId+"' href='/home/show/"+userId+"'><img src='/image/upload/"+imgname+"'></a>");
            }else {
                $('#tttz'+writeId).html('<i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;点赞');
                $('.imagezan'+writeId+' #imgzan'+userId).remove();
            }
        }
    });
};

var cancelWrite = function(id) {
    $('.input-show'+id).show();
    $('.comment-input-detial'+id).hide();
};


