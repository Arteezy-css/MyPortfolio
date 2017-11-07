$(document).ready(function() {

	//PageScroll2Id
	$(".top_mnu a").mPageScroll2id({
		scrollSpeed: 900,
		offset: -10 
	});

	// MixItTap
	$("#portfolio_grid").mixItUp();

	//Port Content
	$(".s_portfolio li ").click(function() {
		$(".s_portfolio li").removeClass("active");
		$(this).addClass("active");
	});

	//Loop
	$(".portfolio_item").each(function(i) {
		$(this).find("a").attr("href", "#work_" + i);
		$(this).find(".port_descr").attr("id", "work_" + i);
	});

	//Head Animate
	$(".top_text h1").animated("fadeInDown", "fadeOutUp");
	$(".top_text p, .section_header").animated("fadeInUp", "fadeOutDown");
	//Animation
	$(".animation_2").animated("fadeInLeft", "fadeOutLeft");
	$(".animation_3").animated("fadeInRight", "fadeOutRight");
	$(".animation_1").animated("flipInY", "flipOutY");
	//Resume Animation
	$(".left .resume_item").animated("fadeInLeft", "fadeOutDown");
	$(".right .resume_item").animated("fadeInRight", "fadeOutDown");

	//Popup
	$(".popup").magnificPopup({type:"image"});
	$(".popup-content").magnificPopup({type:"inline"});

	//Windowed Resize
	function heightDetect(){
		$(".main_head").css("height", $(window).height());
	};
	heightDetect();
	$(window).resize(function(){
		heightDetect();
	});

	// Mnu Button Sandwich
	$(".sandwich").click(function() {
		$(".sandwich").toggleClass("active");
	});
	$(".menu_item, .top_mnu ul a").click(function() {
		$(".top_mnu").fadeOut(200);
		$(".sandwich").toggleClass("active");
	});
	$(".sandwich").click(function() {
		if ($(".top_mnu").is(":visible")) {
			$(".top_mnu").fadeOut(200);
			$("top_mnu li a").removeClass("fadeInUp animated");
		} else {
			$(".top_mnu").fadeIn(200);
			$(".top_mnu li a").addClass("fadeInUp animated");
		};
	});
	
});
// Preloader
$(window).load(function () {
	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut();
});