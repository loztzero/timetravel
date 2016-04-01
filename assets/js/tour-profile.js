$("document").ready(function(){
	setCities();
	setCitiesSearch();

	$("#countryId").change(function(e){
		setCities();
	});

	$("#countryIdSearch").change(function(e){
		setCitiesSearch();
	});
});

$("#file").change(function() {
	var logo = $('input[type=file]')[0].files[0].name;
	$('#logo').val(logo);
});

function setCities(){
	var countryId = $('#countryId').val();
	$.ajax({
		type: "GET",
		url : "tour-profile/city-by-country",
		data : {'countryId':countryId, '_token':'"{{ csrf_token() }}"'},
		success : function(data){
			data = JSON.parse(data);
			$("#cityId").html("<option></option>");
			$.each(data, function(k, v) {
				$("#cityId").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
			});
		}
	},"json");
}

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