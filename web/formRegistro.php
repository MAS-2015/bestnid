
<div class="registro">
	<p class="infoR">COMPLETE LOS DATOS INDICADOS PARA CREARSE UNA CUENTA</p>
	<form required="required" onsubmit="return valido(this)" name="reg" class="reg" method="post" action="modulos/altaUser.php">
	<input required="required" id="nombre" type="text" name="nomyApe" placeholder="Nombre y Apellido"><img src="imagenes/ayuda.png"  Title="* Minimo 7 caracteres" ><span class="oblig">*</span> <div id="Info3"></div><br>
	<input autocomplete="off" required="required" type="text" id="email" name="email" placeholder="Correo Electronico"><img src="imagenes/ayuda.png"  Title="* Ingrese un correo electronico" ><span class="oblig">*</span><div id="Info"></div><br>
	<input autocomplete="off" required="required" id="pass" type="password" maxlength="12" name="pass" placeholder="Contrase&ntilde;a"><img src="imagenes/ayuda.png"  Title="* La contraseña debe tener un minimo de 6 caracteres" ><span class="oblig">*</span><div id="Info4"></div><br>
		<input required="required" type="password" id="passconf" maxlength="12" name="passconfirmacion" placeholder="Vuelve a ingresar su contrase&ntilde;a"><img src="imagenes/ayuda.png"  Title="* Introduzca la misma contraseña del campo anterior" ><span class="oblig">*</span><div id="Info5"></div><br>
		<input required="required" id="tarj" type="text" placeholder="Numero de Tarjeta" name="nroTarj"  maxlength="16" onKeyPress="return soloNumeros(event)"><img src="imagenes/ayuda.png"  Title="* Debe contener 16 numeros" ><span class="oblig">*</span><div id="Info2"></div><br>
	<input type="text" onpaste="return false"  onKeyPress="return soloNumeros(event)" id="tel" maxlength="13" placeholder="Numero de Telefono" name="nroTel"><img src="imagenes/ayuda.png"  Title="* Ingrese su telefono puede ser celular o telefono fijo" ><div id="Info6"></div><br>
	<input type="text" id="domicilio" placeholder="Domicilio" name="domicilio"><img src="imagenes/ayuda.png"  Title="* Minimo 5 caracteres" ><div id="Info7"></div><br><br>
	<input type="submit" id="enviar" value="Registrarse" class="buttom">
	</form>
</div>