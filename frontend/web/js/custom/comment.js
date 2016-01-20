var Comment = {

    AddComment: function(){
      var comment_id = $('#comment_id').val();
      var message = $('#comment-textarea').val();
        var csrf_token = $("meta[name=csrf-token]").attr("content");

    $.ajax({
        url: '/comment/add',
        type: 'POST',
        dataType: 'json',
        cache: false,
        asinc: false,
        data: {
            _csrf: csrf_token,
            comment_id: comment_id,
            message: message
        },
        success: function (data) {
            //alert(data.html);
         $('.row-fluid:last').after(data.html);
         
           $('.row-fluid:last').animate({
       
        opacity: 1
    

      }, 3500 );
         
        }
    });
    }
};