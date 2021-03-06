function getData($id){
	var url = getUrl() + "tour-management/data";
	
	$.ajax({
		type: "GET",
		url : url,
		data : {'id':$id, '_token':'{{ csrf_token() }}'},
		success : function(data){
			data = JSON.parse(data);

			$("#first_name").val(data.first_name);
			$("#last_name").val(data.last_name);
			$("#tour_name").val(data.tour_name);
			$("#phone_number").val(data.phone_number);
			$("#address1").val(data.address1);
			$("#address2").val(data.address2);
			$("#address3").val(data.address3);
			$("#zip_code").val(data.zip_code);
			$("#country_name").val(data.country.country_name);
			$("#city_name").val(data.city.city_name);
		}
	},"json");
}

function getUrl(){
	if (document.location.hostname == "localhost")
		return "http://localhost/timetravel/";
	else
		return "http://" + document.location.hostname + "/";
}