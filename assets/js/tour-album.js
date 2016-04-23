$("#file").change(function() {
	var photo = $('input[type=file]')[0].files[0].name;
	$('#photo').val(photo);
});
