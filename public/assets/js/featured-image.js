var uploader = new plupload.Uploader({
    browse_button : document.getElementById('browse'), // you can pass in id...
    //container: document.getElementById('tab_images_uploader_container'), // ... or DOM Element itself
    url: $baseUrl + '/upload-image-handler',
    headers: {
        'X-CSRF-TOKEN': $token
    },
    init: {
        PostInit: function() {
            $('.image-modifier-container').hide();
        },

        FilesAdded: function(up, files) {
            up.start();
        },

        UploadProgress: function(up, file) {
            $('#uploaded_file_' + file.id + ' > .status').html(file.percent + '%');
        },

        FileUploaded: function(up, file, response) {
            var response = $.parseJSON(response.response);
            if (response.result.status && response.result.status == 'OK') {
                $imagePath = response.result.filePath;
                viewImage(response, $imagePath);
                reloadImageList();
                UIkit.switcher('.image-tab').show(1);
            } else {
                // set failed upload
                // $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-danger").html('<i class="fa fa-warning"></i> Failed');
                // App.alert({type: 'danger', message: 'One of uploads failed. Please retry.', closeInSeconds: 10, icon: 'warning'});
            }
        },

        Error: function(up, err) {
//                App.alert({type: 'danger', message: err.message, closeInSeconds: 10, icon: 'warning'});
        }
    }
});

var reloadImageList = function() {
    $.ajax({
        method: "POST",
        url: $baseUrl + '/' + 'get-images-for-uploader',
        data: { _token: $token }
    })
        .done(function( res ) {
            var $result = $.parseJSON(res);
            if ($result.length > 0) {
                var $images = '';
                var i = 0;
                for(i; i<$result.length; i++) {
                    $imgPath = $result[i].path;
                    $imgDesc = $result[i].description;
                    $imgId = $result[i].id;
                    $images += '<div> \
                        <img src="'+$baseUrl+'/image/medium/'+$imgPath+'" class="uk-padding-small" \
                         data-img-path="'+$imgPath+'" data-img-desc="'+$imgDesc+'" data-img-id="'+$imgId+'" \
                         onclick="viewImage(this, \'\')" /> \
                        </div>'
                }
                $('.image-list-container').empty();
                $('.image-list-container').append($images);
            }
        });
}

function viewImage($this, $imagePath) {
    if ($imagePath != '') {
        $imageUrl = $baseUrl + '/image/featured/' + $imagePath;
        $imageId = $this.result.mediaId;
    } else {
        $imgPath = $($this).attr('data-img-path');
        $imageId = $($this).attr('data-img-id');
        $imageUrl = $baseUrl + '/image/featured/' + $imgPath;
    }
    $imageViewer = '<img src="'+$imageUrl+'" data-img-id="'+$imageId+'" />';
    $('.image-view-container').empty();
    $('.image-view-container').append($imageViewer);
    $('.image-modifier-container').show();
}


$(document).ready(function() {
    // set the button
    imageUrl = $('.featured-image-viewer > a > img').attr('src');
    if (! imageUrl) {
        $('.featured-image-remove-button').hide();
        $('.featured-image-add-button').show();
    } else {
        $('.featured-image-remove-button').show();
        $('.featured-image-add-button').hide();
    }

    // init the plupload
    uploader.init();

    // reload image list
    reloadImageList();

    $('.featured-submit').click(function() {
        imageUrl = $('.image-view-container > img').attr('src');
        if (imageUrl) {
            let imageId = $('.image-view-container > img').attr('data-img-id');
            let altText = $('.image_alt').val();
            let content = '<a href="#featured-image-modal" uk-toggle><img style="margin: 5px;" src="'+imageUrl+'" alt="'+altText+'" /></a>';
            $('.featured-image-id').val(imageId);
            $('.featured-image-viewer').empty();
            $('.featured-image-viewer').append(content);
            $('.featured-image-add-button').hide();
            $('.featured-image-remove-button').show();
            UIkit.modal('#featured-image-modal').hide();
        } else {
            alert('Please choose the image first..!');
        }

    });

    $('.featured-image-remove-button').click(function() {
        $('.featured-image-viewer').empty();
        $('.image-view-container').empty();
        $('.featured-image-add-button').show();
        $('.featured-image-id').val('');
        $('.featured-image-remove-button').hide();
    });
});