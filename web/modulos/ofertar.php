<?php
	include("conexion.php");
	if(is_numeric($_POST["precio"])){
		$precio= $_POST["precio"];
		$motivo = $_POST["motivo"];
		$idSubasta = $_POST["idSubasta"];
		include('funciones_detalle.php');
		chdir('../');
		$idUsuario = buscarIdUsuarioPorIdSubasta($idSubasta);
		if(isset($_POST["idOferta"])){
			$sql= "UPDATE Ofertas SET precio='".$precio."', motivo = '".$motivo."' WHERE idOferta='".$_POST["idOferta"]."'";
		}
		else{
			$sql= "INSERT INTO Ofertas (idOferta, fecha, precio, motivo, idUsuario, idSubasta) VALUES (NULL, NOW(), '".$precio."', '".$motivo."','".$idUsuario."','".$idSubasta."')";
		}
		$resultado= mysqli_query($conexion, $sql);
		mysqli_close($conexion);
		header('Location: ../detalles.php?id='.$idSubasta.'');
	}
	else{ echo 'precio no numerico';}
?>