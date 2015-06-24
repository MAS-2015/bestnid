<?php
	session_start();
	include("conexion.php");
	include('funciones_detalle.php');
	chdir('../');
	if(isset($_POST["eliminar"]) && is_numeric($_POST["idSubasta"]) ){
		$idSubasta = $_POST["idSubasta"];
		$idUsuario = buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
		if(subastaEditable($idSubasta)){
			$sql= "DELETE FROM `subastas` WHERE idUsuario='".$idUsuario."' AND  idSubasta='".$idSubasta."'";
			$resultado= mysqli_query($conexion, $sql);
			mysqli_close($conexion);
			if($resultado){ 
				header('Location: ../index.php?msj=Subasta Eliminada');
			}
			else{
				header('Location: ../index.php?msj=Error al eliminar');
			}
		}
	}
	else{ echo 'Error al eliminar';}
?>