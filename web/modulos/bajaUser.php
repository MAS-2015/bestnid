<?php
	$id=$_POST['id'];
	$pass="UsUaRiOdEsAcTiVaDo";
	include("conexion.php");
	$sql = "SELECT * FROM `ofertas` INNER JOIN `subastas` ON `ofertas`.`idSubasta` = `subastas`.`idSubasta` WHERE `subastas`.`fechaFin` > NOW()  AND `ofertas`.`idUsuario`= '".$id."'";
	$resultado= mysqli_query($conexion, $sql);
	$cantOfertas = mysqli_num_rows($resultado);
	
	$sql = "SELECT * FROM `subastas` WHERE `idUsuario` = '".$id."' AND `fechaFin` > NOW() ";
	$resultado= mysqli_query($conexion, $sql);
	$cantSubastas = mysqli_num_rows($resultado);
	
	if( ($cantOfertas + $cantSubastas) == 0){
		$sql="UPDATE usuarios SET password='".$pass."' WHERE idUsuario=$id";
		$resultado = mysqli_query($conexion, $sql);
		mysqli_close($conexion);
		session_start();
		$_SESSION = array();
		session_destroy();
		$msj='Cuenta desactivada correctamente';
	}
	else{
		$msj='No se puede eliminar la cuenta, hay subastas u ofertas pendientes';
	}
	header('Location: ../index.php?msj='.$msj.'');	
	
?>