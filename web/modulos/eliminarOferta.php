<?php
	session_start();
	include("conexion.php");
	include('funciones_detalle.php');
	chdir('../');
	if(isset($_POST["CancelarOferta"]) && is_numeric($_POST["idOferta"]) && is_numeric($_POST["idSubasta"]) ){
		$idOferta = $_POST["idOferta"];
		$idSubasta = $_POST["idSubasta"];
		$idUsuario = buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
		$sql= "DELETE FROM `ofertas` WHERE idOferta='".$idOferta."' AND idUsuario='".$idUsuario."' AND  idSubasta='".$idSubasta."'";
		$resultado= mysqli_query($conexion, $sql);
		mysqli_close($conexion);
		header('Location: ../detalles.php?id='.$idSubasta.'');
	}
	else{ echo 'precio no numerico';}
?>