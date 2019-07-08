"use strict";
/* ==== Jquery Functions ==== */
(function($) {
	
	$(document).keydown	(function(e) {
		if (e.keyCode == 27) {
			$(".modal").modal('hide');
			$(".modal-backdrop").modal('hide');
		}
	});
	/* alert time out */
	setInterval(function(){
		$("div.alert").remove();
	}, 5000 ); // 5 secs
 

	/* ==== Tool Tip ==== */	
    $('[data-toggle="tooltip"]').tooltip();	
		
	
	/* ==== Testimonials Slider ==== */	
  	$(".testimonialsList").owlCarousel({      
	   loop:true,
		margin:30,
		nav:false,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			768:{
				items:1,
				nav:false
			},
			1170:{
				items:1,
				nav:false,
				loop:true
			}
		}
  	});
	
	/* ==== Testimonials Slider ==== */	
  	$(".employerList").owlCarousel({      
	   loop:true,
		margin:10,
		nav:false,
		responsiveClass:true,
		responsive:{
			0:{
				items:2,
				nav:false
			},
			768:{
				items:4,
				nav:true
			},
			1170:{
				items:6,
				nav:true,
				loop:true
			}
		}
  	});
	
	/* ==== Revolution Slider ==== */
	if($('.tp-banner').length > 0){
		$('.tp-banner').show().revolution({
			delay:6000,
	        startheight:550,
	        startwidth: 1140,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullWidth: 'on'
		});
	}
	
	
	
	//Top search bar open/close
    if (!$('.srchbox').hasClass("searchStayOpen")) {
        $("#empsearch, #jbsearch").focus(function() {
            $(".srchbox").addClass("openSearch");
            $(".additional_fields").slideDown();
        });

        $("html").click(function() {
            $(".srchbox").removeClass("openSearch");
            $(".additional_fields").slideUp();
        });

        $(".srchbox").click(function(e) {
            e.stopPropagation();
        });
	}
	document.querySelector("input[name='current_salary']").addEventListener("keypress", function (evt) {
		if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
		{
			evt.preventDefault();
		}
	});
	document.querySelector("input[name='expected_salary']").addEventListener("keypress", function (evt) {
		if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
		{
			evt.preventDefault();
		}
	});
	document.querySelector("input[name='salary_from']").addEventListener("keypress", function (evt) {
		if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
		{
			evt.preventDefault();
		}
	});
	document.querySelector("input[name='salary_to']").addEventListener("keypress", function (evt) {
		if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
		{
			evt.preventDefault();
		}
	});
})(jQuery);