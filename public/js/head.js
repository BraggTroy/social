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
