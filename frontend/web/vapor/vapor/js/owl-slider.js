/*
  Project Name : Mountain Biking
  Author Company : Ewebcraft
  Project Date: 16 June, 2015
  Author Website : http://www.ewebcraft.com
  Author Email : ewebcraft@gmail.com
*/

(function($) {
  "use strict";	   

    $("#trail-slider").owlCarousel({
      autoplay: true,
      pagination: false,
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      stopOnHover: true,
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3] 
    });

    $("#instructor-slider").owlCarousel({
 
      autoplay: true,
      pagination: false,
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      stopOnHover: true,
      items : 5,
      itemsDesktop : [1199,5],
      itemsDesktopSmall : [979,5] 
    });

    $("#parts-slider").owlCarousel({
 
      autoplay: true,
      pagination: false,
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      stopOnHover: true,
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3] 
    });

    $("#gallery-slider").owlCarousel({
 
      autoplay: true,
      pagination: false,
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      stopOnHover: true,
      items : 4,
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [979,4] 
    });

    $("#testimonials-slider").owlCarousel({ 
        autoPlay: true,
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        stopOnHover: true,        
        singleItem:true,
        pagination:false,
        paginationNumbers:false,
        transitionStyle:"backSlide"  
    });

    $("#sponsers-slider").owlCarousel({
          navigation : true,
          navigationText: [
        "<i class='fa fa-chevron-left'></i>",
        "<i class='fa fa-chevron-right'></i>"],
          loop:true,
          autoplay:true,
          autoplayHoverPause:true,
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          stopOnHover: true,
          items : 4,
          dots: false,
          pagination:false,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
        });    
})(jQuery);
    

