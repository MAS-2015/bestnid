function valido(reg) {   
  
    var vermail=/^((\w|\.){2,}@)\w{3,}\.\w{2,4}((\.(\w{2}))?)?$/;
    var vernumtel=/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/;
	var vernumtarj=/^((67\d{2})|(4\d{3})|(5[1-5]\d{2})|(6011))(-?\s?\d{4}){3}|(3[4,7])\ d{2}-?\s?\d{6}-?\s?\d{5}$/;  
    if(document.reg.nomyApe.value.length < 7) {
        alert("Por favor escriba un nombre valido, debe tener un mínimo de 7 caracteres.");
        document.reg.nomyApe.focus() 
        return false; 
    } else
		if (!((document.reg.email.value !="") && (document.reg.email.value.match (vermail))) ) 
            {
                alert('Por favor, ingrese un email correcto');
                document.reg.email.focus() 
                return false; 
            }
	else
		if(document.reg.pass.value.length < 6) {
			alert("Por favor escriba un contraseña valida, debe tener un mínimo de 6 caracteres.");
			document.reg.pass.focus() 
			return false; 
		}
	else
		clave1 = document.reg.pass.value
    	clave2 = document.reg.passconfirmacion.value 
		if((document.reg.passconfirmacion.value.length < 6) || (clave1 != clave2)){
			alert("Las contraseñas no coinciden, debe colocar las mismas contraseñas en ambos campos");
			document.reg.passconfirmacion.focus() 
			return false;			
		}
	else
		if (!((document.reg.nroTarj.value !="") && (document.reg.nroTarj.value.match (vernumtarj)))){
			    alert('Por favor, ingrese una tarjeta valida');
                document.reg.nroTarj.focus() 
                return false; 
		}	
	else
		if (document.reg.nroTel.value !=""){
			  if(!(document.reg.nroTel.value.match (vernumtel))){
			    alert('Por favor, ingrese un telefono correcto');
                document.reg.nroTel.focus() 
                return false; 
			  }
		}
	else 
		if (document.reg.domicilio.value !=""){
			if(document.reg.domicilio.value.length < 5) {
			    alert('Por favor, ingrese un domicilio correcto');
                document.reg.domicilio.focus() 
                return false;
			}
		}
	else
		if (document.getElementById("Error")){
			alert('Correo existente.. por Favor ingrese un Correo electronico distinto');
			document.reg.email.focus()
			return false;
		}
	else
		if (document.getElementById("ErrorTarjeta")){
			alert('Tarjeta en uso por otro usuario.. por Favor ingrese una tarjeta distinta');
			document.reg.nroTarj.focus()
			return false;
		}		

  }