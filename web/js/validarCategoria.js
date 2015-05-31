function validarCategoria(formCategoria){
	var nombreCategoria = document.getElementById(formCategoria).value;
	
	if(nombreCategoria.length < 2 || /^\s+$/.test(nombreCategoria)){
		alert("El nombre de la categoría contener minímo 3 carácteres");
		return false;
	
	}
	
	else{return true};
}