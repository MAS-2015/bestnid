$(document).ready(function() {    
	$('#titulo').blur(function(){
		if(document.altaSubasta.titulo.value.length > 200){
			$('#Info3').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(100);
			$('#Info3').fadeIn(100).html("<div id='Error'>El t&iacute;tulo debe ser menor a 200 caracteres.</div>");
		}
		else{
			$('#Info3').fadeIn(100).html("");
		}
	});
});

function validarImagen(){
	var archivo = document.altaSubasta.imagen.value;
	extensiones_permitidas = new Array(".gif", ".jpg", ".jpeg", ".png");
	error = "";
	extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
	permitida = false;
	if( !archivo ){ permitida = true; }
	for (var i = 0; i < extensiones_permitidas.length; i++) {
		if (extensiones_permitidas[i] == extension) {
			permitida = true;
			break;
		}
	}
	if (!permitida) {
		error = "Comprueba la extensión de la imagen a subir. \nSólo se pueden subir imaenges: " + extensiones_permitidas.join();
		$('#Info').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(100);
		$('#Info').fadeIn(100).html("<div id='Error'>"+error+"</div>");
	}else{
		$('#Info').fadeIn(100).html("");
	}
}

$(document).ready(function() {
	$('#imagen').change( function(){validarImagen();} );
});