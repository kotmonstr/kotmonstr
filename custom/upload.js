function sendfile() {
    var fd = new FormData(document.getElementById("form-send-file"));
    fd.append("CustomField", "This is some extra data");
    $.ajax({
        url: "/image/submit",
        type: "POST",
        data: fd,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        beforeSend: function (xhr) {
        jpreloader('show');
        },
        success: function (data) {
            //alert(data);
             jpreloader('hide');
            //$('.mce-combobox.mce-last.mce-abs-layout-item input').val(data);
            //alert(data);
        }
    })
    
    ;/* Preloader */
function jpreloader(item) {
    if (item == 'show') {
        $(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
    } else {
        $('.jpreloader').remove();
    }
}

}