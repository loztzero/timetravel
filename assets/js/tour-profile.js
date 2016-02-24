$("document").ready(function(){
	$("#countryId").change(function(e){
		var countryId = this.value;
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
	});
	
	$("#countryIdSearch").change(function(e){
		var countryIdSearch = this.value;
		$.ajax({
			type: "GET",
			url : "tour-itinerary/city-by-country-search",
			data : {'countryIdSearch':countryIdSearch, '_token':'"{{ csrf_token() }}"'},
			success : function(data){
				data = JSON.parse(data);
				$("#cityIdSearch").html("<option value='%' selected>Semua</option>");
				$.each(data, function(k, v) {
					$("#cityIdSearch").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
				});
			}
		},"json");
	});
});

$("#file").change(function() {
	var photo = $('input[type=file]')[0].files[0].name;
	$('#photo').val(photo);
});