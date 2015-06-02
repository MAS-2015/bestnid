<?php
	
	if(!(empty($_POST['nombre']))){
		include("conexion.php");
		$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
		$idCategoria = mysqli_real_escape_string($conexion,$_REQUEST['selector']);
		$sql="UPDATE `categorias` SET `nombre` = '$nombre' WHERE `idCategoria`='$idCategoria'";
		$resultado= mysqli_query($conexion, $sql);
		if($resultado){
			$salida= "modificacion exitosa.";
		} 
		else { 
			$salida= "modificacion fallida.";
		}
	mysqli_close($conexion);
}
?>