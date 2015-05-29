
<div class="registro">
	<p class="infoR">COMPLETE LOS DATOS INDICADOS PARA CREARSE UNA CUENTA</p>
	<form required="required" onsubmit="return valido(this)" name="reg" class="reg" method="post" action="modulos/altaUser.php">
	<input required="required" type="text" name="nomyApe" placeholder="Nombre y Apellido"><span class="oblig">*</span><br><br>
	<input required="required" type="text" id="email" name="email" placeholder="Correo Electronico"><span class="oblig">*</span><div id="Info"></div><br><br>
	<input required="required" type="password" name="pass" placeholder="Contrase&ntilde;a"><span class="oblig">*</span><br><br>	<input required="required" type="password" name="passconfirmacion" placeholder="Vuelve a ingresar su contrase&ntilde;a"><span class="oblig">*</span><br><br>	
		<input required="required" id="tarj" type="text" placeholder="Numero de Tarjeta" name="nroTarj" onpaste="return false" onKeyPress="return soloNumeros(event)"><span class="oblig">*</span><div id="Info2"></div><br><br>
	<input type="text" onpaste="return false"  onKeyPress="return soloNumeros(event)" placeholder="Numero de Telefono" name="nroTel"><br><br>
	<input type="text"  placeholder="Domicilio" name="domicilio"><br><br>
	<input type="submit" id="enviar" value="Registrarse" class="buttom">
	</form>
</div>