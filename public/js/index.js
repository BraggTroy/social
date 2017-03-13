
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