$("document").ready(function(){
	setCitiesSearch();

	$("#countryIdSearch").change(function(e){
		setCitiesSearch();
	});
});

function getData($id){
	var token =  '"{{ csrf_token() }}"';
	$.ajax({
		type: "GET",
		url : "tour-management/data",
		data : {'id':$id, '_token':token},
		success : function(data){
			data = JSON.parse(data);

			$("#id").val($id);
			$("#title").val(data.title);
			$("#currencyId").val(data.mst004_id);
			$("#price").val(data.price);
			$("#category").val(data.category);
			$("#min_pax").val(data.min_pax);
			$("#start_period").val(data.start_period);
			
			if(data.end_period && data.end_period != '0000-00-00')
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

function setCitiesSearch(){
	var countryIdSearch = $('#countryIdSearch').val();
	$.ajax({
		type: "GET",
		url : "tour-management/city-by-country-search",
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