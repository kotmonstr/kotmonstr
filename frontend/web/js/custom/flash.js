

function ChangeVideo(youtube_id) {  
    console.log('ChangeVideo');
    //$('.' + youtube_id ).html('<iframe width="330" height="230" src="//www.youtube.com/embed/'+ youtube_id +'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
    var result = $('.target-' + youtube_id).html('<iframe  height="235px" width="355px" src="//www.youtube.com/embed/' + youtube_id + '?autoplay=1" frameborder="0" allowfullscreen></iframe>');
}

function hideImage(el) {
    if ($('.a-' + el).height() > 241) {
        $('.a-' + el).parent().hide();
    }
    $('.b-' + el).show();
}
function showImage(el) {
    $('.b-' + el).hide();
}
function DeleteVideoById(el, id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/video/delete',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            id: id
        },
        success: function (data) {
            if (data.result == 'ok') {
                el.parent().remove();
            } else {
                alert('Ошибка , нет такого видео!');
            }
        }
    });
}
function GetVideoByCategiryId(categoria_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    var id = $("#dropdown-categoria option:selected").val();  
    $.ajax({
        url: '/video/get-video-by-categoria-id',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            id: id
        },
        success: function (data) {
         $('#target').html(data);
        }
    });
}
function GetVideoByAuthorId(categoria_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    var id = $("#dropdown-author option:selected").val();  
    $.ajax({
        url: '/video/get-video-by-author-id',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            id: id
        },
        success: function (data) {
         $('#target').html(data);
        }
    });
}
function GetVideoByTime() {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    var time = $("#dropdown-time option:selected").val();
    $.ajax({
        url: '/video/get-video-by-time',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            time: time
        },
        success: function (data) {
         $('#target').html(data);
        }
    });
}






