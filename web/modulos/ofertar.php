<?php
	session_start();
	include("conexion.php");
	if(is_numeric($_POST["precio"])){
		$precio= $_POST["precio"];
		$motivo = $_POST["motivo"];
		$idSubasta = $_POST["idSubasta"];
		include('funciones_detalle.php');
		chdir('../');
		$idUsuario = buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
		if(isset($_POST["idOferta"])){
			$sql= "UPDATE ofertas SET precio='".$precio."', motivo = '".$motivo."', fecha = NOW() WHERE idOferta='".$_POST["idOferta"]."'";
		}
		else{
			$sql= "INSERT INTO ofertas (idOferta, fecha, precio, motivo, idUsuario, idSubasta) VALUES (NULL, NOW(), '".$precio."', '".$motivo."','".$idUsuario."','".$idSubasta."')";
		}
		$resultado= mysqli_query($conexion, $sql);
		mysqli_close($conexion);
		header('Location: ../detalles.php?id='.$idSubasta.'');
	}
	else{ echo 'precio no numerico';}
?>