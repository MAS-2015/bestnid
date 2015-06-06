<?php
	
	if(!(empty($_POST['nombre']))){
		include("conexion.php");
		$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
		$idCategoria = mysqli_real_escape_string($conexion,$_REQUEST['selector']);
		$sql="UPDATE `categorias` SET `nombre` = '$nombre' WHERE `idCategoria`='$idCategoria'";
		$resultado= mysqli_query($conexion, $sql);
		if($resultado){
			$salida = "Modificaci&oacute;n exitosa.";
			$tipo = "Success";
		} 
		else { 
			$salida = "Modificaci&oacute;n fallida.";
			$tipo = "Error";
		}
	mysqli_close($conexion);
}
?>