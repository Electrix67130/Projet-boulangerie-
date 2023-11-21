function keto_organic_diet_menu_open_nav() {
	window.keto_organic_diet_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function keto_organic_diet_menu_close_nav() {
	window.keto_organic_diet_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});

	new WOW().init();
});

jQuery(document).ready(function () {
	window.keto_organic_diet_currentfocus=null;
  	keto_organic_diet_checkfocusdElement();
	var keto_organic_diet_body = document.querySelector('body');
	keto_organic_diet_body.addEventListener('keyup', keto_organic_diet_check_tab_press);
	var keto_organic_diet_gotoHome = false;
	var keto_organic_diet_gotoClose = false;
	window.keto_organic_diet_responsiveMenu=false;
 	function keto_organic_diet_checkfocusdElement(){
	 	if(window.keto_organic_diet_currentfocus=document.activeElement.className){
		 	window.keto_organic_diet_currentfocus=document.activeElement.className;
	 	}
 	}
 	function keto_organic_diet_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.keto_organic_diet_responsiveMenu){
			if (!e.shiftKey) {
				if(keto_organic_diet_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				keto_organic_diet_gotoHome = true;
			} else {
				keto_organic_diet_gotoHome = false;
			}

		}else{

			if(window.keto_organic_diet_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.keto_organic_diet_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.keto_organic_diet_responsiveMenu){
				if(keto_organic_diet_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					keto_organic_diet_gotoClose = true;
				} else {
					keto_organic_diet_gotoClose = false;
				}
			
			}else{

			if(window.keto_organic_diet_responsiveMenu){
			}}}}
		}
	 	keto_organic_diet_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});