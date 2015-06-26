<?php
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	include("conexion.php");
	$sql="UPDATE usuarios SET password='".$pass."' WHERE idUsuario=$id";
	$resultado = mysqli_query($conexion, $sql);
	mysqli_close($conexion);
	$msj='Datos modificados correctamente';
	header('Location: ../perfil.php?msj='.$msj.'');	
	
?>