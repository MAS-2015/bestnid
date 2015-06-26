<?php
	$id=$_POST['id'];
	$nom=$_POST['nomyApe'];
	$tarj=$_POST['nroTarj'];
	$tel=$_POST['nroTel'];
	echo "$tel";
	$dom=$_POST['domicilio'];
	include("conexion.php");
	$sql="UPDATE usuarios SET nombreApellido='".$nom."', nroTarjeta=$tarj, 	telefono=$tel, domicilio='".$dom."' WHERE idUsuario=$id";
	$resultado = mysqli_query($conexion, $sql);
	mysqli_close($conexion);
	$msj='Datos modificados correctamente';
	header('Location: ../perfil.php?msj='.$msj.'');	
	
?>