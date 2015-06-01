String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g,''); }

function validarCategoria(formCategoria){
	var nombreCategoria = document.getElementById(formCategoria).value.trim();
	var soloLetras = /^[a-zA-Z]*(\s[a-zA-Z]*){0,1}$/;
	 //palabras = nombreCategoria.split(" ");
	
	if(nombreCategoria.length < 2 || /^\s+$/.test(nombreCategoria)){
		alert("El nombre de la categoría debe contener minímo 3 carácteres");
		return false;
	
	}
	else if (/^[a-zA-Z]\s.*$/.test(nombreCategoria) ){
			alert("la primer palabra debe contener al menos 2 caracteres");
			return false;
		}

	
	/*else if(palabras.length > 2) {
		alert("El nombre de la categoria no puede superar las 2 palabras o mal uso de espacios en blanco");
		return false;
	}*/
	else if(!(soloLetras.test(nombreCategoria))){
		alert("funcionaaaaaa");
		return false;
	}
	else{return true};
}
