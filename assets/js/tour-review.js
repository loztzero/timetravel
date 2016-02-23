$("document").ready(function(){
	$("#countryIdSearch").change(function(e){
		var countryIdSearch = this.value;
		$.ajax({
			type: "GET",
			url : "tour-review/city-by-country-search",
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