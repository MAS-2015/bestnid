
<div class="registro">
	<p class="infoR">COMPLETE LOS DATOS INDICADOS PARA CREARSE UNA CUENTA</p>
	<form onsubmit="return valido(this)" name="reg" class="reg" method="post" action="modulos/altaUser.php">
	<input type="text" name="nomyApe" placeholder="Nombre y Apellido"><span class="oblig">*</span><br><br>
	<input type="text" name="email" placeholder="Correo Electronico"><span class="oblig">*</span><br><br>
	<input type="password" name="pass" placeholder="Contrase&ntilde;a"><span class="oblig">*</span><br><br>	<input type="password" name="passconfirmacion" placeholder="Vuelve a ingresar su contrase&ntilde;a"><span class="oblig">*</span><br><br>	
	<input type="number" placeholder="Numero de Tarjeta" name="nroTarj"><span class="oblig">*</span><br><br>
	<input type="number" maxlength="16" placeholder="Numero de Telefono" name="nroTel"><br><br>
	<input type="text"  placeholder="Domicilio" name="domicilio"><br><br>
	<input type="submit" value="Registrarse" class="buttom">
	</form>
</div>