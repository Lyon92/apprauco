

function eliminar(url){

	if (confirm('¿Realmente desea eliminar este registro?')){

		window.location=url;

	}
}

$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});