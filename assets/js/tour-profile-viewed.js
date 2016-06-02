$("document").ready(function(){
	setCities();

	$("#countryId").change(function(e){
		setCities();
	});
});

function setCities(){
	var url = getUrl() + "tour-profile-viewed/city-by-country";
	var countryId = $('#countryId').val();
	
	$.ajax({
		type: "GET",
		url : url,
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

function getUrl(){
	if (document.location.hostname == "localhost")
		return "http://localhost/timetravel/";
	else
		return "http://" + document.location.hostname + "/";
}