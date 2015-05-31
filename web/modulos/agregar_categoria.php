<?php
  				
if(!(empty($_POST['nombre']))) {
  
  	include("conexion.php");
  	$nombre = mysqli_escape_string($conexion, $_POST["nombre"]);
  	$sql = "INSERT INTO categorias (idCategoria, nombre) values (NULL,'".$nombre."')";
	$resultado= mysqli_query($conexion, $sql);
	if ($resultado){
			echo '<p class="infoR"> Categoria '. "$nombre".' agregada </p> ';
		}
	mysqli_close($conexion);
	}
					
  			
?>