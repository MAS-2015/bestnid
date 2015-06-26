function validarSelector(selector){
	indice = document.getElementById(selector).selectedIndex;
	if (indice == null || indice == 0){
		alert("Debe seleccionar un tipo de consulta");
		return false;
	}
	return true;
}

function validarFechas(fecha1,fecha2){
	validarFecha= /^\d{4}-\d{2}-\d{2}$/;
	fecha1 = document.getElementById(fecha1).value;
	fecha2 = document.getElementById(fecha2).value;
	if(fecha1 !="" && fecha2 !=""){
		if(fecha1.match(validarFecha) && fecha2.match(validarFecha)){
			if(existeFecha(fecha1) && existeFecha(fecha2)){
				return true;}
			else{ 
				alert("Error en la entrada de fechas.Fecha inexistente");
				return false;
				}
		}
		else{
			alert("Error en la entrada de fechas. Error de formato");
    		mensaje= document.getElementById('msjFormato');
    		mensaje.innerHTML= "El formato de fecha es AAAA-MM-DD ";
    		return false;	
		}
	}
    else{
    	alert("Error en la entrada de fechas. Campo vac\u00EDo");
    	return false;
    }
}



function existeFecha (fecha) {
        var fechaf = fecha.split("-");
        var d = fechaf[2];
        var m = fechaf[1];
        var y = fechaf[0];
        return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
       }