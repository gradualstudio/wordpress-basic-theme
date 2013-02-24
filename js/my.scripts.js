/*MY SCRIPTS*/

$(document).ready(function(){


	// Slider Home - Jquery Cycle / http://jquery.malsup.com/cycle/

    $('#slider-home').cycle({ 
    fx:			'fade', 
    speed:		1000 ,
    pager:		'.controlNav',
    next:		'.next',
    prev:		'.prev',
    width:		'100%',
    fit:		1, // default: 0 - force slides to fit container
    containerResize: 0, // default: 1 - resize container to fit largest slide 
    nowrap:		0, // default: 0 - true to prevent slideshow from wrapping
    height:     'auto',
    after: slideAfter,
    before: function() { // caption function
	    $('#caption').slideUp();
	    }
    });
    
   function slideAfter() { // caption function
   	$('#caption').html(this.alt).slideDown();
   }

   // Responsive Slider
   function resizeslider() {
   var $slideHeight = $('#slider-home img').height();
   $('#wrapper-slider').css('height', $slideHeight);
   }
   
   resizeslider();
   
   $(window).resize( function(){
   resizeslider();
   });
   
   
   // Custom Javascript
   
});



