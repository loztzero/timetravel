//slideshow plugin
$(window).load(function() {
	$('.flexslider').flexslider({animation: "slide"});
});

//Scroll To Top plugin
$(document).ready(function(){
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});

	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
});

$(document).scroll(function() {
	if($(window).scrollTop() > $("header").height() && $(window).width() > 768) {
		$("#sb-wrapper").addClass("stickk");
		$("#sub-logo").removeClass("d-none");
		$("#s-label").addClass("fs1-right");
		$("#SearchBar").css({"background":"none"});
	} else {
		$("#sb-wrapper").removeClass("stickk");
		$("#sub-logo").addClass("d-none");
		$("#s-label").removeClass("fs1-right");
		$("#SearchBar").css({"background":"rgb(250,250,250)"});
	}
});