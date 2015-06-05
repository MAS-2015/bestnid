<?php
	include("conexion.php");
	$nom= addslashes($_POST["nomyApe"]);
	$email= addslashes($_POST["email"]);
	$pass= addslashes($_POST["pass"]);
	$nroTarj= ($_POST["nroTarj"]);
	$nroTel= addslashes($_POST["nroTel"]);
	$dom= addslashes($_POST["domicilio"]);
	$sql = "INSERT INTO usuarios (idUsuario, email, password, domicilio, nombreApellido, nroTarjeta, telefono) VALUES  (NULL,'".$email."','".$pass."','".$dom."','".$nom."','".$nroTarj."', '".$nroTel."')";
	$resultado= mysqli_query($conexion, $sql);
	mysqli_close($conexion);
 	$msj="La cuenta se creo con exito";
 	header('Location: ../index.php?msj='.$msj.'');

?>