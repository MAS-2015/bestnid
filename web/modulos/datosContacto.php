<?php
session_start();
include('conexion.php');
include('funciones_detalle.php');
chdir('../');
if(isset($_SESSION["Usuario"]) && subastaTerminada($_POST["idSubasta"]) ){
	$idUsuario=buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
	$idSubasta=$_POST["idSubasta"];
	if(dueñoSubasta($idUsuario,$idSubasta)){
		$sql = "SELECT * FROM `usuarios` WHERE `idUsuario` = '".idGanadorSubasta($idSubasta)."'";
		echo'
		<p style="text-decoration:underline;">Informaci&oacute;n ganador:</p>
		';
		$resultado = mysqli_query($conexion,$sql);
		$fila=mysqli_fetch_assoc($resultado);
		echo'
		<p>Email de contacto: '.$fila["email"].'</p>
		<p>Teléfono: '.$fila["telefono"].'</p>
		';
		$sql = "SELECT * FROM `ofertas` WHERE `idUsuario` = '".idGanadorSubasta($idSubasta)."' AND `idSubasta` = '".$idSubasta."'";
		$resultado = mysqli_query($conexion,$sql);
		$fila=mysqli_fetch_assoc($resultado);
		echo '
		<p>Monto a cobrar: $'.($fila["precio"]*0.7).'</p>
		';
		
	}elseif( ganadorSubasta($idUsuario,$idSubasta) ){
		$sql = "SELECT * FROM `usuarios` WHERE `idUsuario` = '".buscarIdUsuarioPorIdSubasta($idSubasta)."'";
		echo'
		<p>Informaci&oacute;n subastador:</p><br>
		';
		$resultado = mysqli_query($conexion,$sql);
		$fila=mysqli_fetch_assoc($resultado);
		echo'
		<p>Email de contacto: '.$fila["email"].'</p>
		<p>Teléfono: '.$fila["telefono"].'</p>
		';
	}
}
mysqli_close($conexion);
?>