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
	<input required="required" value="'.$datos[0].'" id="nombre" type="text" name="nomyApe" placeholder="Nombre y Apellido"><img src="imagenes/ayuda.png"  Title="* Minimo 7 caracteres" ><span class="oblig">*</span> <div id="Info3"></div><br>
		<input required="required" id="tarj" value="'.$datos[2].'" type="text" placeholder="Numero de Tarjeta" name="nroTarj"  maxlength="16" onKeyPress="return soloNumeros(event)"><img src="imagenes/ayuda.png"  Title="* Debe contener 16 numeros" ><span class="oblig">*</span><div id="Info2"></div><br>
	<input type="text" value="'.$datos[3].'" onpaste="return false"  onKeyPress="return soloNumeros(event)" id="tel" maxlength="13" placeholder="Numero de Telefono" name="nroTel"><img src="imagenes/ayuda.png"  Title="* Ingrese su telefono puede ser celular o telefono fijo" ><div id="Info6"></div><br>
	<input type="text" value="'.$datos[1].'" id="domicilio" placeholder="Domicilio" name="domicilio"><img src="imagenes/ayuda.png"  Title="* Minimo 5 caracteres" ><div id="Info7"></div><br><br>
	<input type="submit" id="enviar" value="Actualizar Valores" class="buttom">
	</form>
</div>';
	mysqli_close($conexion);

?>