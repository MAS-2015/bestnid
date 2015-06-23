<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['Usuario'];
	$sql="SELECT s.titulo, s.idSubasta, o.motivo, o.precio FROM ofertas as o INNER JOIN usuarios as u ON (o.idUsuario=u.idUsuario) INNER JOIN subastas as s ON (o.idSubasta=s.idSubasta) WHERE u.email='".$usr."'";
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) > 0){
		while($ofertas= mysqli_fetch_row($resultado)){
			echo"Su oferta fue $ofertas[2] con un valor de $ofertas[3] $ a la subasta";
			echo"<a href='detalles.php?id=$ofertas[1]'> $ofertas[0] </a>";
		}
	} else {
		echo"Todavia no oferto ningun producto";
	}
	mysqli_close($conexion);

?>