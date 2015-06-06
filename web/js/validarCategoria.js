String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g,''); }

function validarCategoria(formCategoria){
	var nombreCategoria = document.getElementById(formCategoria).value.trim();
	document.getElementById(formCategoria).value = nombreCategoria;
	var soloLetras = /^[a-zA-Z\u00E1\u00E9\u00ED\u00F3\u00FA\u00C1\u00C9\u00CD\u00D3\u00DA\u00F1\u00D1]*(\s[a-zA-Z\u00E1\u00E9\u00ED\u00F3\u00FA\u00C1\u00C9\u00CD\u00D3\u00DA\u00F1\u00D1]*){0,1}$/; //{0,n-1} n=2=cantidad de palabras permitidas
	
	if(nombreCategoria.length < 2 || /^\s+$/.test(nombreCategoria)){
		alert("El nombre de la categor\u00EDa debe contener min\u00EDmo 3 caracteres");
		return false;
	
	}
	else if (/^[a-zA-Z]\s.*$/.test(nombreCategoria) ){
			alert("La primer palabra debe contener al menos 2 caracteres");
			return false;
		}

	else if(!(soloLetras.test(nombreCategoria))){
		alert("El nombre de la categor\u00EDa no debe contener caracteres especiales o m\u00E1s de 2 palabras");
		return false;
	}
	return true;
}

function validarSelector(selector){
	indice = document.getElementById(selector).selectedIndex;
	if (indice == null || indice == 0){
		alert("Debe seleccionar una categor\u00EDa");
		return false;
	}
	return true;
}

function validarNombreDiferentes(formcategoria, selector){
		indice = document.getElementById(selector).selectedIndex;
		nombre = document.getElementById(selector).options[indice].text.trim();

		if(document.getElementById(formcategoria).value.trim() == nombre){
			alert("El nombre nuevo y nombre actual deben ser diferentes");
			return false;
		}
		return true;
}

function validarSelectorYCategoria(formcategoria, selector){
	if(validarSelector(selector)){  
		if(validarCategoria(formcategoria)){
			if(validarNombreDiferentes(formcategoria, selector)){return true;}
		}
	}
	return false;

}

function salida(textoSalida,tipo){
	divSalida = document.querySelector("#salida");

	divSalida.setAttribute('id',tipo);
	divSalida.style.maxWidth = '200px';
	divSalida.style.position = 'relative';
	divSalida.style.top = '50px';
	divSalida.style.right= '95px';
	divSalida.innerHTML = textoSalida;


}