
$(document).ready(function () {
    $('.act').bootstrapSwitch('state', true, true);
    $('.non-act').bootstrapSwitch('state', false, true);

    $('.act').on('switchChange.bootstrapSwitch', function (event, state) {
        var id = $(this).attr('id');
       //alert(id + ' : ' + state + '| ' + event); // true | false
        sendDataToSlider(id,state);
    });
    $('.non-act').on('switchChange.bootstrapSwitch', function (event, state) {
        var id = $(this).attr('id');
        //alert(id + ' : ' + state + '| ' + event); // true | false
        sendDataToSlider(id,state);
    });
});
function sendDataToSlider(id,state){
    //alert(1);
      var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/banner/change-activety',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            _csrf: csrf_token,
            id: id,
            state:state
        },
        success: function (data) {
           //alert(data.id +' | '+ data.state);
        }
    });
}