function sendfile() {
   
    
    ;/* Preloader */
function jpreloader(item) {
    if (item == 'show') {
        $(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
    } else {
        $('.jpreloader').remove();
    }
}

}

function startUpload(){
    var fd = new FormData(document.getElementById("form-article"));
    $('.avatar').html('');
    $.ajax({
        url: "/article/image-submit",
        type: "POST",
        data: fd,
        asinc:false,
        processData: false,
        contentType: false,
        success: function (data) {
            $('.avatar').html('<img src="/upload/article/'+ data +'" height="200px" width="150px" alt="image">')
            $('#article-image').val(data);
        },
 
    })
}