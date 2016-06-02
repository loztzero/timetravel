$("document").ready(function(){
	setCities();

	$("#countryId").change(function(e){
		setCities();
	});
});

function setCities(){
	var countryId = $('#countryId').val();
	$.ajax({
		type: "GET",
		url : "tour-profile-viewed/city-by-country",
		data : {'countryId':countryId, '_token':'{{ csrf_token() }}'},
		success : function(data){
			data = JSON.parse(data);
			$("#cityId").html("<option></option>");
			$.each(data, function(k, v) {
				$("#cityId").append("<option value='"+v.id+"'>"+v.city_name+"</option>");
			});
		}
	},"json");
}

$('.input-daterange').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: "dd-mm-yyyy"
});