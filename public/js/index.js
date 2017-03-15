
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

//上传图片
var suc = sc = new Array();
var num = 0;
$("#ttt_input").fileinput({
    showRemove : false,
    language : 'zh',
    allowedPreviewTypes : [ 'image' ],
    allowedFileExtensions : [ 'jpg', 'png', 'gif' ],
    maxFileSize : 10240,
    previewFileType:'any',
    previewFileIcon : '',
    uploadUrl : "{{ url('/image/upload') }}",
    browseClass: "btn btn-primary",
    showCaption: false,
    enctype: 'multipart/form-data',
    'fileActionSettings' : {
        // showZoom: false,
        showUpload: false
    }
});
// 选择图片预览时
$('#ttt_input').on('fileloaded', function(event, file, previewId, index, reader) {
    // 上传图片的总量
    num = parseInt(previewId.split('-').pop())+1;
});
// 隐藏清空input
$('.fileinput-remove').hide();
// 上传成功后
$('#ttt_input').on('fileuploaded', function(event, data, previewId, index) {
    // 图片上传成功后,将图片名保存到数组
    if (data.response['code'] == 1) {
        sc[sc.length] = suc[suc.length] = data.response['content']['file']['savename'];
    }
    if(suc.length>0 && (parseInt(previewId.split('-').pop())+1) == num){
        // 存放图像html代码
        var ima = new Array();
        // 删除
        var dele = new Array();
        var j=0;
        for (var m in suc){
            if (suc[m]) {
                ima[j] = "<img src='/Public/upload/" + suc[m] + "' width='256px' class='file-preview-image' />";
                dele[j] = {
                    url: '/Home/Upload/delete',
                    showZoom: false,
                    caption: '上传成功',
                    key: m,
                    extra: {name: suc[m]}
                };
            }
            j++;
        }
        $('#ttt_input').fileinput('clear');
        // 刷新视图
        $('#ttt_input').fileinput('refresh',{
            initialPreview : ima,
            initialPreviewConfig:dele,
        }).fileinput('enable');
        $('.btn-file').hide();
        // 隐藏清空input
        $('.fileinput-remove').hide();
        $('#up-modal-footer').toggle();
        $('#e_image').toggle();
        $('#ttt-ui-button-c6').toggle();
        var t = '';
        for (var i=0;i<sc.length;i++){
            t += "<img src='/Public/upload/"+sc[i]+"' width='163px'/>";
        }
        $('#showImage div').html(t);
    }
});
$('#ttt_input').on('filedeleted', function(event, key) {
    num--;
    sc[key] = 2;
    var t = '';
    for (var i=0;i<sc.length;i++){
        if (sc[i] != 2) {
            t += "<img src='/Public/upload/" + sc[i] + "' width='163px'/>";
        }
    }
    $('#showImage div').html(t);
    if (num == 0){
        $('#ttt_input').fileinput('disable');
        $('.ttt-modal-body').html('<div class="ttt-modal-text">请刷新页面重新上传</div>');
    }
});