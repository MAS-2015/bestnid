<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['Usuario'];
	$sql="SELECT s.titulo, s.idSubasta FROM subastas as s INNER JOIN usuarios as u ON (u.idUsuario=s.idUsuario) WHERE u.email='".$usr."'";
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) > 0){
		while($subastas= mysqli_fetch_row($resultado)){
			echo"<a href='detalles.php?id=$subastas[1]'> $subastas[0] </a>";
		}
	} else {
		echo"Todavia no subasto ningun producto";
	}
	mysqli_close($conexion);

?>