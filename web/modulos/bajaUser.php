<?php
	$id=$_POST['id'];
	$pass="UsUaRiOdEsAcTiVaDo";
	include("conexion.php");
	$sql="UPDATE usuarios SET password='".$pass."' WHERE idUsuario=$id";
	$resultado = mysqli_query($conexion, $sql);
	mysqli_close($conexion);
	session_start();
	$_SESSION = array();
	session_destroy();
	$msj='Cuenta desactivada correctamente';
	header('Location: ../index.php?msj='.$msj.'');	
	
?>