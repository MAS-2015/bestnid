<?php
  				
if(!(empty($_POST['nombre']))) {
  
  	include("conexion.php");
  	$nombre = mysqli_escape_string($conexion, $_POST["nombre"]);
  	$sql = "INSERT INTO categorias (idCategoria, nombre) values (NULL,'".$nombre."')";
	$resultado= mysqli_query($conexion, $sql);
	if ($resultado){
			//echo '<p"> Categoria '. "$nombre".' agregada </p> ';
			  $salida = 'Categoria '. "$nombre".' agregada  ';
			  $tipo= "Success";
			  
		
		}
	else{
		$salida ='EL nombre ya se encuentra en la base de datos o error en la misma';
		$tipo = "Error";
	}
	echo "<script> salida('$salida','$tipo');</script>";
	mysqli_close($conexion);
	}
					
  			
?>