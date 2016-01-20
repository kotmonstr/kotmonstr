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
    //alert(22);
     var fd = new FormData(document.getElementById("form-prifile"));
     $('.avatar').html('');
    $.ajax({
        url: "/profile/image-submit",
        type: "POST",
        data: fd,
        asinc:false,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
//        beforeSend: function (xhr) {
//        jpreloader('show');
//        },
        success: function (data) {
            //alert(data);
            $('.avatar').html('<img src="/upload/user/'+ data +'" height="2000px" width="150px" alt="image">')
             //jpreloader('hide');
            //$('.mce-combobox.mce-last.mce-abs-layout-item input').val(data);
            //alert(data);
            window.location.reload();
        },
 
    })
}