$("document").ready(function(){
	setCities();

	$("#countryId").change(function(e){
		setCities();
	});
});

function getData($id){
	var token = '"{{ csrf_token() }}"';
	$.ajax({
		type: "GET",
		url : "tour-itinerary/data",
		data : {'id':$id, '_token':token},
		success : function(data){
			data = JSON.parse(data);
			
			$("#id").val($id);
			$("#title").val(data.title);
			$("#currencyId").val(data.mst004_id);
			$("#price").val(data.price);
			$("#category").val(data.category);
			$("#category option[value='"+data.category+"']").prop('selected', true);
			$("#min_pax").val(data.min_pax);
			$("#start_period").val(new Date(data.start_period).toString("dd-MM-yyyy"));
			$("#end_period").val(new Date(data.end_period).toString("dd-MM-yyyy"));
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

$("#file").change(function() {
	var photo = $('input[type=file]')[0].files[0].name;
	$('#photo').val(photo);
});

function setCities(){
	var countryId = $('#countryId').val();
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
}

$('.input-daterange').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: "dd-mm-yyyy"
});