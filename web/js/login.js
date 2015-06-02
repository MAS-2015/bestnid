function validar(login){
	var vermail=/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;
	if (!((document.login.email.value !="") && (document.login.email.value.match (vermail))) ) 
            {
                alert('Por favor, ingrese un email correcto');
                document.login.email.focus() 
                return false; 
            }
}