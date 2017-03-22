

//上传图片 //ima 存放图像html代码  //dele 删除
var suc = [];
var ima = [];
var dele =  [];
var num = 0;

$("#ttt_input").fileinput({
    showRemove : false,
    language : 'zh',
    allowedPreviewTypes : [ 'image' ],
    allowedFileExtensions : [ 'jpg', 'png', 'gif' ],
    maxFileSize : 10240,
    previewFileType:'any',
    previewFileIcon : '',
    uploadUrl : "/upload",
    browseClass: "btn btn-primary",
    showCaption: false,
    enctype: 'multipart/form-data',
    type: 'post',
    'fileActionSettings' : {
        // showZoom: false,
        showUpload: false
    },
    uploadExtraData: { '_token':$('#token').val() }
});
// 隐藏清空input
$('.fileinput-remove').hide();
// 上传成功后
$('#ttt_input').on('fileuploaded', function(event, data, previewId, index) {
    num++;
    // 图片上传成功后,将图片名保存到数组
    if (data.response['code'] == 1) {
        suc[data.response['filename']] = data.response['filename'];
    }
});
$('#ttt_input').on('filebatchuploadcomplete', function(event, files, extra) {
    var i = 0;
    for (var key in suc) {
        ima[i] = "<img src='/image/upload/" + suc[key] + "' width='256px' height='256px' class='file-preview-image' />";
        dele[i] = {
            url: '/upload/delete',
            showZoom: true,
            caption: '上传成功',
            key: key,
            extra: {name: suc[key],'_token':$('#token').val()}
        };
        i++;
    }

    $('#ttt_input').fileinput('clear');
    // 刷新视图
    $('#ttt_input').fileinput('refresh',{
        initialPreview : ima,
        initialPreviewConfig:dele
    }).fileinput('enable');
    // 隐藏清空input
    $('.fileinput-remove').hide();
    $('#showImage').show();
    var t = '';
    for (var i in suc){
        t += "<img src='/image/upload/"+suc[i]+"' />";
    }
    $('#showImage div').html(t);
    resize($('#showImage div img'), 240);
});
$('#ttt_input').on('filedeleted', function(event, key) {
    var t = '';
    delete(suc[key]);
    console.log(suc);
    for (var i in suc){
        t += "<img src='/image/upload/" + suc[i] + "'/>";
    }
    $('#showImage div').html(t);
    resize($('#showImage div img'), 240);
    num--;
    if (num == 0){
        suc = [];
        ima = [];
        dele =  [];
        $('#ttt_input').fileinput('clearStack');
        $('#showImage').hide();
    }
});

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

