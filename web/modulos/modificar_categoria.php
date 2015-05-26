<?php
	
	if(!(empty($_POST['nombre']))){
		include("conexion.php");
		$nombre = $_POST['nombre'];
		$idCategoria= $_REQUEST['selector'];
		$idCategoria = mysqli_real_escape_string($conexion,$idCategoria);
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