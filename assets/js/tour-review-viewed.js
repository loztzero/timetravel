function addRating(element){
	$("#chooseRating i").each(function() {
		if(Number(this.id) <= Number(element.id)){
			$(this).addClass("c-ygreen");
		} else {
			$(this).removeClass("c-ygreen");
		}
	});

	$("#range").val(Number(element.id));
}

