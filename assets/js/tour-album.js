$("document").ready(function(){
	setCitiesSearch();

	$("#countryIdSearch").change(function(e){
		setCitiesSearch();
	});
});

$("#file").change(function() {
	var photo = $('input[type=file]')[0].files[0].name;
	$('#photo').val(photo);
});

function setCitiesSearch(){
	var countryIdSearch = $('#countryIdSearch').val();
	$.ajax({
		type: "GET",
		url : "tour-itinerary/city-by-country-search",
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