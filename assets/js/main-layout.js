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
	
	setCitiesSearch();

	$("#countryIdSearch").change(function(e){
		setCitiesSearch();
	});
});

$(document).scroll(function() {
	if($(window).scrollTop() > 400 && $(window).width() > 768) {
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

function setCitiesSearch(){
	var url = getUrl() + "main/city-by-country-search";
	var countryIdSearch = $('#countryIdSearch').val();
	
	$.ajax({
		type: "GET",
		url : url,
		data : {'countryIdSearch':countryIdSearch, '_token':'{{ csrf_token() }}'},
		success : function(data){
			data = JSON.parse(data);
			$("#cityIdSearch").html("<option value='' selected>All City</option>");
			$.each(data, function(k, v) {
				$("#cityIdSearch").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
			});
		}
	},"json");
}

function getUrl(){
	if (document.location.hostname == "localhost")
		return "http://localhost/timetravel/";
	else
		return "http://" + document.location.hostname + "/";
}