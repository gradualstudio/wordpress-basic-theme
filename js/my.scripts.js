/* MY SCRIPTS */

$(document).ready(function(){

	var $window = $(window);
	var $windowWidth = $window.width();
   
   // Superfish https://github.com/joeldbirch/superfish
   if (($windowWidth) > 768){
   
   jQuery('ul.sf-menu').superfish({
			delay:       500,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast',                          // faster animation speed
			autoArrows:  false                            // disable generation of arrow mark-up
		});
	}
		
	// Slider Home - Jquery Cycle / http://jquery.malsup.com/cycle/

    $('#slider-home').cycle({ 
    fx:			'fade', 
    speed:		1000 ,
    pager:		'.controlNav',
    next:		'.next',
    prev:		'.prev',
    height:     'auto',
    fit:		1, // default: 0 - force slides to fit container
    containerResize: 0, // default: 1 - resize container to fit largest slide 
    nowrap:		0, // default: 0 - true to prevent slideshow from wrapping
    after: showContent,
    before: hideContent
    });
    
    function hideContent() { 
	    $('#slider-home .content').animate({
	    	opacity: 0,
	    	bottom: '-=110'
		    }, 500);
    }
    
    function showContent() { 
	    $('#slider-home .content').animate({
		    opacity: 0.9,
		    bottom: '+=110'
		    }, 500, function() {});
    }
    
   // Responsive Switch
   
   var $menu = $('.navbar');
   $('.close-menu').click(function() {
   		$menu.slideToggle('fast');
	});
   
   // Custom Javascript
   
});



