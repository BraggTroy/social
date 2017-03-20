
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
    $('.write-article').css('display', 'block');
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
        layui.use(['layer'], function(){
            var layer = layui.layer;
            layer.msg('小主，超出字数限制啦，快删掉点', {time: 2000, icon:5});
        });
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
        $.ajax({
            type: 'POST',
            url: '/submit/write',
            data: {
                'content': $('.middle .write-article .article-input').val(),
                'see': $('.middle .after-footer .btn .btn-name').attr('value'),
                '_token' : $('#token').val()
            }
        });
    }
};



