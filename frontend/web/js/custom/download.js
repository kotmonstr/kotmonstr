function Download(book_id){
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    //alert(book_id);
    $.ajax({
        url: '/book/match',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: true,
        data: {
            _csrf: csrf_token,
            id: book_id
        },
        success: function (data) {
            if (data.result == 'ok') {
                window.location.reload();
            } else {
                alert('Ошибка , нет такой книги!');
            }
        }
    });
}