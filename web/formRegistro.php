
<div class="registro">
	<p class="infoR">COMPLETE LOS DATOS INDICADOS PARA CREARSE UNA CUENTA</p>
	<form required="required" onsubmit="return valido(this)" name="reg" class="reg" method="post" action="modulos/altaUser.php">
	<input required="required" id="nombre" type="text" name="nomyApe" placeholder="Nombre y Apellido"><span class="oblig">*</span> <div id="Info3"></div><br>
	<input required="required" type="text" id="email" name="email" placeholder="Correo Electronico"><span class="oblig">*</span><div id="Info"></div><br>
	<input required="required" id="pass" type="password" maxlength="12" name="pass" placeholder="Contrase&ntilde;a"><span class="oblig">*</span><div id="Info4"></div><br>
		<input required="required" type="password" id="passconf" maxlength="12" name="passconfirmacion" placeholder="Vuelve a ingresar su contrase&ntilde;a"><span class="oblig">*</span><div id="Info5"></div><br>
		<input required="required" id="tarj" type="text" placeholder="Numero de Tarjeta" name="nroTarj"  maxlength="16" onKeyPress="return soloNumeros(event)"><span class="oblig">*</span><div id="Info2"></div><br>
	<input type="text" onpaste="return false" maxlength="13" onKeyPress="return soloNumeros(event)" id="tel" placeholder="Numero de Telefono" name="nroTel"><div id="Info6"></div><br>
	<input type="text" id="domicilio" placeholder="Domicilio" name="domicilio"><div id="Info7"></div><br><br>
	<input type="submit" id="enviar" value="Registrarse" class="buttom">
	</form>
</div>