$("document").ready(function(){
	setCities();

	$("#countryId").change(function(e){
		setCities();
	});
});

$("#file").change(function() {
	var logo = $('input[type=file]')[0].files[0].name;
	$('#logo').val(logo);
});

function setCities(){
	var url = getUrl() + "tour-register/city-by-country";
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

function getUrl(){
	if (document.location.hostname == "localhost")
		return "http://localhost/timetravel/";
	else
		return "http://" + document.location.hostname + "/";
}