
$(document).ready(function () {
    setTimeout(function () {
        $('#mce_31').attr('onclick', 'AddButtonImage()');
        //alert("Hello");
        //$('#mce_77-body').append('<span>22</span>');
    }, 3000);

    $('#form-send-file').change(function () {
        var fd = new FormData(document.getElementById("form-send-file"));
        fd.append("CustomField", "This is some extra data");
        $.ajax({
            url: "/blog/create-image",
            type: "POST",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            beforeSend: function (xhr) {
                        jpreloader('show');
            },
            success: function (data) {
                   jpreloader('hide');
                    $('.mce-combobox.mce-last.mce-abs-layout-item input').val(data);
                   //alert(data);
            }
        });
    });
});


function AddButtonImage() {
    setTimeout(function () {
        $('.mce-window-head .mce-title').append('<button type="button" class="btn-upload" href="javascript:void(0);" onclick="ActiveForm()">Загрузка изображений</button>');
    }, 1000);
    //
}

function confirmDelete(event) {
    if (confirm("Вы подтверждаете удаление?")) {
        return true;
    } else {
        event.preventDefault();
    }
}
function ActiveForm() {
  
    $('.send-file').click();
}

/* Preloader */
function jpreloader(item) {
    if (item == 'show') {
        $(document.body).append('<div class="back_background jpreloader" style="z-index: 90000;"></div>');
    } else {
        $('.jpreloader').remove();
    }
}
