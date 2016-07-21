var MyWidget = {

    // свойства
    SelfKill: true,

    //методы

    // Проверка новостей из парсера
    CheckNews: function () {
        console.log('CheckNews');
        var csrf_token = jQuery("meta[name=csrf-token]").attr("content");
        setInterval(function () {
            $.ajax({
                url: '/blog/add-news-from-parser',
                type: 'POST',
                dataType: 'json',
                data: {
                    _csrf: csrf_token,

                },
                success: function (data) {
                    //alert(data);
                    if(data == 1){
                        MyWidget.Show();
                    }
                   }
            });
        },30000);
    },

    // Вывод инфо блока
    Show: function (SelfKill) {
        var template = '<div class="system_message">' +
            '<a href="javascript:void(0)" onclick="MyWidget.Close()"><h5 class="close-button-x">X</h5></a>' +
            '<span>Новости обновленны</span>' +
            '</div>';
        jQuery('body').append(template);

        if (MyWidget.SelfKill) {
            setTimeout(function () {
                jQuery('.system_message').hide('slow');
            }, 5000);
        }
    },

    // скрытие инфо блока
    Close: function () {
        jQuery('.system_message').hide('slow');
    }
};

$(document).ready(function () {
    //MyWidget.Show(SelkKill = true);
    MyWidget.CheckNews();
});


