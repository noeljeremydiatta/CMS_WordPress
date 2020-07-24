function cafe_coffee_shop_menu_open_nav() {
	window.responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function cafe_coffee_shop_menu_close_nav() {
	window.responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(document).ready(function () {
	window.currentfocus=null;
  	cafe_coffee_shop_checkfocusdElement();
	var body = document.querySelector('body');
	body.addEventListener('keyup', cafe_coffee_shop_check_tab_press);
	var gotoHome = false;
	var gotoClose = false;
	window.responsiveMenu=false;
 	function cafe_coffee_shop_checkfocusdElement(){
	 	if(window.currentfocus=document.activeElement.className){
		 	window.currentfocus=document.activeElement.className;
	 	}
 	}
 	function cafe_coffee_shop_check_tab_press(e) {
		"use strict";
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.responsiveMenu){
			if (!e.shiftKey) {
				if(gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				gotoHome = true;
			} else {
				gotoHome = false;
			}

		}else{

			if(window.currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.responsiveMenu){
				if(gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					gotoClose = true;
				} else {
					gotoClose = false;
				}
			
			}else{

			if(window.responsiveMenu){
			}}}}
		}
	 	cafe_coffee_shop_checkfocusdElement();
	}
});