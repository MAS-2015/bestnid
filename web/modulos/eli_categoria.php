<?php //eliminar categoria
	include("modulos/conexion.php");
	if(isset($_REQUEST['selector'])){
		$idCategoria= $_REQUEST['selector'];
		$sql = "SELECT * FROM `subastas` WHERE `idCategoria`= '$idCategoria'";
		$resultado= mysqli_query($conexion, $sql);
			if(mysqli_num_rows($resultado)>0){
				$salida = "No se puede eliminar categoria, aun tiene subastas asociadas";
				}	
			else{
				$sql = "DELETE FROM `categorias` WHERE `idCategoria`='$idCategoria'";
				$resultado= mysqli_query($conexion, $sql);
					if($resultado){
						$salida="eliminacion exitosa.";
					}

			}
	}
	mysqli_close($conexion);
	

	?>