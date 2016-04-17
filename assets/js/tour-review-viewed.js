$("document").ready(function(){
	setCitiesSearch();

	$("#countryIdSearch").change(function(e){
		setCitiesSearch();
	});
});

function setCitiesSearch(){
	var countryIdSearch = $('#countryIdSearch').val();
	$.ajax({
		type: "GET",
		url : "tour-review-viewed/city-by-country-search",
		data : {'countryIdSearch':countryIdSearch, '_token':'"{{ csrf_token() }}"'},
		success : function(data){
			data = JSON.parse(data);
			$("#cityIdSearch").html("<option value='%' selected>All City</option>");
			$.each(data, function(k, v) {
				$("#cityIdSearch").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
			});
		}
	},"json");
}

function addRating(element){
	$("#chooseRating i").each(function() {
		if(Number(this.id) <= Number(element.id)){
			$(this).addClass("c-ygreen");
		} else {
			$(this).removeClass("c-ygreen");
		}
	});

	$("#range").val(Number(element.id));
}
