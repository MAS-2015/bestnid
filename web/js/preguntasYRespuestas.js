String.prototype.trim = function(){ return this.replace(/^\s+|\s+$/g,''); }

function enviar(form){
	textArea = form.querySelector(".textoRespuesta");
	textoRespuesta = textArea.value.trim();
	textArea.value = textoRespuesta;
	if(textoRespuesta.length == 0 ||/^\s+$/.test(textoRespuesta)){
		alert("La respuesta no debe ser vac\u00EDa");
	}
	else{
		alert("enviando el subbwacho");
		form.submit();
	}
}

function mostrarResponder(pregunta){
	botonResponder = pregunta.querySelector('.reply');
	botonResponder.style.visibility = 'visible';
}

function ocultarResponder(pregunta){
	botonResonder = pregunta.querySelector('.reply');
	botonResponder.style.visibility ='hidden';
}

function mostrarFormResponder(boton){
	formResponder = boton.parentNode;
	inputRespuesta = formResponder.querySelector('.textoRespuesta');
	botonCancelar = formResponder.querySelector('.cancel');
	botonCancelar.style.visibility = 'visible';
	inputRespuesta.style.display = 'block';
	preguntasSubasta = document.getElementById('preguntasSubasta');

	preguntas = preguntasSubasta.getElementsByClassName('preguntaConResponder');
	cantPreguntas = preguntas.length;
	for(i=0;i< cantPreguntas;i++){
		preguntas[i].setAttribute("onmouseout",";");
		preguntas[i].setAttribute("onmouseover",";");
	}
	boton.setAttribute("onclick","enviar(this.parentNode);");
}

function cancelarResponder(boton){
	boton.style.visibility= 'hidden';
	formResponder = boton.parentNode;
	inputRespuesta = formResponder.querySelector('.textoRespuesta');
	inputRespuesta.style.display='none';
	botonResponder = formResponder.querySelector('.reply');
	botonResponder.setAttribute("onclick","mostrarFormResponder(this);");

	preguntasSubasta = document.getElementById('preguntasSubasta')

	preguntas = preguntasSubasta.getElementsByClassName('preguntaConResponder');
	cantPreguntas = preguntas.length;
	for(i=0;i< cantPreguntas;i++){
		preguntas[i].setAttribute("onmouseout","ocultarResponder(this);");
		preguntas[i].setAttribute("onmouseover","mostrarResponder(this);");
	}

} 
function setFuncionesPregunta(idPregunta){
	pregunta =document.getElementById(idPregunta);

	pregunta.setAttribute("onmouseout","ocultarResponder(this);");
	pregunta.setAttribute("onmouseover","mostrarResponder(this);");
	pregunta.setAttribute("class", "preguntaConResponder");
}

function validarPregunta(iDTextArea){

	textoPregunta = document.getElementById(iDTextArea).value.trim();
	document.getElementById(iDTextArea).value = textoPregunta;
	if(textoPregunta.length < 10 || /^\s+$/.test(textoPregunta)){
		alert("La pregunta debe contener min\u00EDmo 10 caracteres");
		return false;
	}
	return true;
}