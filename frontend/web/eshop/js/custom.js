/*
 Добавляет товар в список желаний
 */
function AddToWishList(good_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/add-to-wishlist',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id
        },
        success: function (data) {
            if (data.success) {
                //ToDo модальное окно
                $('#system_window').modal('show');
                $('.modal-body').html(data.success);
                $('#wishlist').html(data.quantity);

            }

            if (data.error) {
                $('#system_window').modal('show');
                $('.modal-body').html(data.error)
            }


        }
    });
}
/*
 Добавляет товар в список сравнения
 */

function AddToCompareList(good_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/add-to-comparelist',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id
        },
        success: function (data) {
            if (data.success) {
                //ToDo модальное окно
                $('#system_window').modal('show');
                $('.modal-body').html(data.success)
                $('#comparelist').html(data.quantity);

            }

            if (data.error) {
                $('#system_window').modal('show');
                $('.modal-body').html(data.error)
            }


        }
    });
}

/*
 Удаляет товар в список желаний
 */
function RemoveFromWishList(good_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/remove-from-wishlist',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id
        },
        success: function (data) {
            if (data.success) {
                $('#wish_good_' + good_id).remove();

            }

            if (data.error) {
                alert(data.error);
            }


        }
    });
}


/*
 Добавляет товар в корзину
 */
function addToCart(e,good_id) {
    animateFlyToCart(e,good_id);
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/add-to-cart',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id
        },
        success: function (data) {
            $('#money').html(data.quantity);
            //alert(data.html);


        }
    });
}
/*
 Добавляет много товаров в корзину
 */
function addToCartTotal(good_id, total) {

    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/add-to-many-cart',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id,
            total: total
        },
        success: function (data) {
            $('#item-all').html(data.quantity);
            $('#total').val(1);
            //alert(data.html);


        }
    });
}

/*
 *Выводит товары по категории
 */
function getGoodsByCategoryId(category_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/get-goods-by-category',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            category_id: category_id
        },
        success: function (data) {
            $('.features_items').html(data);


        }
    });
}
/*
 *Увеличивает количество товаров на 1 еденицу
 */
function AddMoreQuantity(good_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/add-more-quantity',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id
        },
        success: function (data) {
            $('#quantity-' + good_id).attr('value', data.new_quantity);
            $('#price-' + good_id).text('$' + data.new_price);
            $('#minus-' + good_id).show();
            $('#money').html(data.total);

        }
    });
}
/*
 *Уменьшает количество товаров на 1 еденицу
 */
function RemoveMoreQuantity(good_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/remove-more-quantity',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id
        },
        success: function (data) {

            $('#quantity-' + good_id).attr('value', data.new_quantity);
            $('#price-' + good_id).text('$' + data.new_price);
            var q = $('#quantity-' + good_id).val();
            if (data.new_quantity == 1) {
                $('#minus-' + good_id).hide();
            }
            $('#money').html(data.total);
        }
    });
}
/*
 *Удаляет товар из корзины
 */
function DeleteFromCart(good_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/delete-from-cart',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            good_id: good_id
        },
        success: function (data) {
            if (data) {
                $('#row-' + good_id).remove();
                $('#item-all').html(data.total);
            }

        }
    });
}

/*
 *    Дернет массив горолов выбранной страны
 */


function getArrCities() {
    var country_id = $('#country').val();
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/get-cities',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            country_id: country_id
        },
        success: function (data) {
            $('#city').html(data.html);
        }
    });
}
//  Вернет все товары бренда
function getGoodsByBrend(brend_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/shop/get-goods-by-brend',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            brend_id: brend_id
        },
        success: function (data) {
            $('.features_items').html(data);
        }
    });
}
// Создать заказ
function MakeOrder() {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    var formData = $("#form-order").serialize();
    var country = $('#country').val();
    var city = $('#city').val();
    $.ajax({
        url: '/shop/make-order',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: formData,
        success: function (data) {
            $('.features_items').html(data);
        }
    });
}
// Отсылка сообщения
function AddContact() {

    var csrf_token = $("meta[name=csrf-token]").attr("content");
    var formData = $("#main-contact-form").serialize();
    $.ajax({
        url: '/shop/add-contact',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: formData,
        success: function (data) {
            if (data.success) {
                $('.alert-error').hide();
                $('.alert-success').show();
                $('.alert').html('');
                $('.alert').append(data.success);
                setTimeout("  $('.alert-success').hide('slow');", 5000);
            } else {
                $('.alert-error').show();
                $('.alert-success').hide();
                $('.alert').html('');
                $('.alert').append(data.error);
            }

        }
    });
}

function animateFlyToCart(e,good_id) {
    var Img = $('.img-' + good_id);
    var ImgClone = Img.clone(true);
    ImgClone.appendTo('body');
    ImgClone.css("position", "absolute");
    ImgClone.css("z-index", "100");
    ImgClone.css("top", "55%");
    ImgClone.css("left", "42%");




    ImgClone.animate(
        {
            top: "0px",
            left: "70%",
            width: "-2%",
            height: "-2%"
        },
        500,"swing", function(){ImgClone.remove()} );
}


$("#demo-box").click(function(e) {
    var offset = $(this).offset();
    var relativeX = (e.pageX - offset.left);
    var relativeY = (e.pageY - offset.top);

    alert("X: " + relativeX + "  Y: " + relativeY);
});
