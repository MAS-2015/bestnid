<?php
	session_start();
	include("conexion.php");
	include('funciones_detalle.php');
	chdir('../');
	if(is_numeric($_POST["ganador"]) && is_numeric($_POST["idSubasta"]) ){
		$idOferta = $_POST["ganador"];
		$idSubasta = $_POST["idSubasta"];
		$idUsuario = buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
		if( $idUsuario == buscarIdUsuarioPorIdSubasta($idSubasta)){
			$sql= "UPDATE subastas SET idOfertaGanadora='".$idOferta."' WHERE idSubasta='".$idSubasta."'";
			$resultado= mysqli_query($conexion, $sql);
		}
		mysqli_close($conexion);
	}
	else{ echo 'precio no numerico';}
?>