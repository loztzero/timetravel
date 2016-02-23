$("document").ready(function(){
	$("#countryId").change(function(e){
		var countryId = this.value;
		$.ajax({
			type: "GET",
			url : "tour-itinerary/city-by-country",
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

function getData($id){
	var token =  '"{{ csrf_token() }}"';
	$.ajax({
		type: "GET",
		url : "tour-itinerary/data",
		data : {'id':$id, '_token':token},
		success : function(data){
			data = JSON.parse(data);

			$("#currency").val(data.currency);
			$("#price").val(data.price);
			$("#category").val(data.category);
			$("#min_pax").val(data.min_pax);
			$("#start_period").val(data.start_period);
			$("#end_period").val(data.end_period);
			$("#countryId").val(data.mst002_id);
			$("#description").val(data.description);

			$("#cityId").html("<option></option>");
			$.each(data.cities, function(k, v) {
				if(data.mst003_id == v.id)
					$("#cityId").append("<option value='"+v.id+"' selected>"+v.city_name+"</option>");
				else
					$("#cityId").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
			});
		}
	},"json");
}