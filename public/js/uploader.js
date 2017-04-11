var image = [], num = 0;
$('#fine-uploader-s3').fineUploader({
    template: 'qq-template-s3',
    request: {
        endpoint: "/upload",
        params: {
            '_token': $('#token').val(),
            'type' : 'write'
        }
    },
    cors: {
        expected: true
    },
    chunking: {
        enabled: true
    },
    resume: {
        enabled: true
    },
    deleteFile: {
        enabled: true,
        method: 'POST',
        endpoint: "/upload/delete",
        params: {
            '_token': $('#token').val()
        }
    },
    validation: {
        itemLimit: 5,
        sizeLimit: 15000000
    },
    thumbnails: {
        placeholders: {
            notAvailablePath: "/fineuploader/placeholders/not_available-generic.png",
            waitingPath: "/fineuploader/placeholders/waiting-generic.png"
        }
    },
    callbacks: {
        onComplete: function(id, name, response) {
            var previewLink = qq(this.getItemByFileId(id)).getByClass('preview-link')[0];

            if (response.success) {
                previewLink.setAttribute("href", "/image/upload/"+response.newUuid);
                image[image.length] = response.newUuid;
                num++;
            }
        },
        onAllComplete: function() {
            $('#managePic').html('<i class="icon-picture"></i>&nbsp;管理照片');
        },
        onDeleteComplete: function() {
            num--;
            if (num == 0) {
                $('#managePic').html('<i class="icon-picture"></i>&nbsp;照片');
            }
        }
    }
});

