$("document").ready(function(){
	$("#countryId").change(function(e){
		var countryId = this.value;
		$.ajax({
			type: "GET",
			url : "tour-register/city-by-country",
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
});

$("#file").change(function() {
	var logo = $('input[type=file]')[0].files[0].name;
	$('#logo').val(logo);
});