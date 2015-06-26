<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['id'];
	$sql="SELECT u.nombreApellido, u.domicilio, u.nroTarjeta, u.telefono, u.idUsuario FROM usuarios as u WHERE u.idUsuario=$usr";
	$resultado = mysqli_query($conexion, $sql);
	$datos= mysqli_fetch_row($resultado);
	echo'
<div class="registro">
	<p class="infoR">MODIFIQUE LOS CAMPOS DESEADOS</p>
	<form required="required" onsubmit="return valido(this)" name="reg" class="reg" method="post" action="modulos/updUser.php">
	<input  style="display:none" value="'.$datos[4].'" id="id" type="text" name="id" placeholder=""><br>
	<span class="oblig">Nombre y Apellido:<br></span>
	<input required="required" value="'.$datos[0].'" id="nombre" type="text" name="nomyApe" placeholder="Nombre y Apellido"><img src="imagenes/ayuda.png"  Title="* Minimo 7 caracteres" ><span class="oblig">*</span> <div id="Info3"></div><br>
	<span class="oblig">Numero de su tarjeta:<br></span>
	<input required="required" id="tarj" value="'.$datos[2].'" type="text" placeholder="Numero de Tarjeta" name="nroTarj"  maxlength="16" onKeyPress="return soloNumeros(event)"><img src="imagenes/ayuda.png"  Title="* Debe contener 16 numeros" ><span class="oblig">*</span><div id="Info2"></div><br>
	<span class="oblig">Numero de su telefono:<br></span>
	<input type="text" value="'.$datos[3].'" onpaste="return false"  onKeyPress="return soloNumeros(event)" id="tel" maxlength="13" placeholder="Numero de Telefono" name="nroTel"><img src="imagenes/ayuda.png"  Title="* Ingrese su telefono puede ser celular o telefono fijo" ><div id="Info6"></div><br>
	<span class="oblig">Domicilio:<br></span>
	<input type="text" value="'.$datos[1].'" id="domicilio" placeholder="Domicilio" name="domicilio"><img src="imagenes/ayuda.png"  Title="* Minimo 5 caracteres" ><div id="Info7"></div><br><br>
	<input type="submit" id="enviar" value="Actualizar Valores" class="buttom">
	</form>
</div>';
	echo '
	<div class="contrasena">
	<p class="infoR">MODIFIQUE SU CONTRASE&Ntilde;A</p>
	<form required="required" onsubmit="return valido(this)" name="reg" class="reg" method="post" action="modulos/updPass.php">
	<input  style="display:none" value="'.$datos[4].'" id="id" type="text" name="id" placeholder=""><br>
	<input autocomplete="off" required="required" id="pass" type="password" maxlength="12" name="pass" placeholder="Contrase&ntilde;a Nueva"><img src="imagenes/ayuda.png"  Title="* La contraseña debe tener un minimo de 6 caracteres" ><span class="oblig">*</span><div id="Info4"></div><br>
		<input required="required" type="password" id="passconf" maxlength="12" name="passconfirmacion" placeholder="Vuelve a ingresar su nueva contrase&ntilde;a"><img src="imagenes/ayuda.png"  Title="* Introduzca la misma contraseña del campo anterior" ><span class="oblig">*</span><div id="Info5"></div><br>
			<input type="submit" id="enviar" value="Actualizar contrase&ntilde;a" class="buttom"></form>
		</div>
		<div class="baja">
		<p class="infoR">BORRAR SU CUENTA</p>
		<form required="required" name="reg" class="reg" method="post" action="modulos/bajaUser.php" onsubmit=" return confirm(\'Est&aacute; seguro? la cuenta se borrara de forma permanente\');" >
		<input  style="display:none" value="'.$datos[4].'" id="id" type="text" name="id" placeholder=""><br>
		<input type="submit" id="enviar" value="Borrar su cuenta"  class="buttom"></form>
		</div>
		';
	mysqli_close($conexion);

?>