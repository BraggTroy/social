
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
    var elem = $('.' + _class);
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
        var img = '';
        $('#showImage div img').each(function(){
            img += this.src.split('/').pop() + '/';
        });
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



//layer弹出框
var commonMsg = function(str, i) {
    layui.use(['layer'], function(){
        var layer = layui.layer;
        layer.msg(str, {time: 2000, icon:i});
    });
};



