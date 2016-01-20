
function ChangeVideo(youtube_id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    console.log('ChangeVideo');
    //$('.' + youtube_id ).html('<iframe width="330" height="230" src="//www.youtube.com/embed/'+ youtube_id +'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
    $('.target-' + youtube_id ).html('<iframe  height="235px" width="355px" src="//www.youtube.com/embed/'+ youtube_id +'?autoplay=1" frameborder="0" allowfullscreen></iframe>');



}

function hideImage(el){

    $('.b-'+el).show();
    //$('.'+el).hide();
 
    
}
function showImage(el){

    $('.b-'+el).hide();
    //$('.'+el).hide();
 
    
}

