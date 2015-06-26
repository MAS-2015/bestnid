<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['Usuario'];
	$sql="SELECT s.titulo, s.idSubasta, o.motivo, o.precio,s.imagen, o.fecha FROM ofertas as o INNER JOIN usuarios as u ON (o.idUsuario=u.idUsuario) INNER JOIN subastas as s ON (o.idSubasta=s.idSubasta) WHERE u.email='".$usr."' AND DATE(fechaFin)>CURDATE()";
	echo "SUS OFERTAS EN SUBASTAS ACTIVAS: <BR>";
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) > 0){
		
		while($ofertas= mysqli_fetch_row($resultado)){
			echo"<div class='cajita'>";
			echo"Su oferta fue: $ofertas[2] <br>Con un valor de $ofertas[3] $ <br>En la subasta";
			echo"<a href='detalles.php?id=$ofertas[1]'> $ofertas[0] </a>";
			echo"<img src='$ofertas[4]'>";
			echo"<div class='opc'><a href='detalles.php?id=$ofertas[1]'>VER</a> | 
			<a href=''>EDITAR</a> | <a href=''>ELIMINAR</a></div>";
			echo"<div class='fecha'>Fecha: $ofertas[5]</div>";
			echo"</div>";
		}
	} else {
		echo"No tiene ofertas en subastas activas.<BR><BR><BR>";
	}
	$sql2="SELECT s.titulo, s.idSubasta, o.motivo, o.precio,s.imagen, o.fecha FROM ofertas as o INNER JOIN usuarios as u ON (o.idUsuario=u.idUsuario) INNER JOIN subastas as s ON (o.idSubasta=s.idSubasta) WHERE u.email='".$usr."' AND DATE(fechaFin)<CURDATE()";
	echo "SUS OFERTAS EN SUBASTAS FINALIZADAS <BR>";
	$resultado2 = mysqli_query($conexion, $sql2);
	if(mysqli_num_rows($resultado2) > 0){
		
		while($ofertas= mysqli_fetch_row($resultado2)){
			echo"<div class='cajita'>";
			echo"Su oferta fue: $ofertas[2] <br>Con un valor de $ofertas[3] $ <br>En la subasta";
			echo"<a href='detalles.php?id=$ofertas[1]'> $ofertas[0] </a>";
			echo"<img src='$ofertas[4]'>";
			echo"<div class='fecha'>Fecha: $ofertas[5]</div>";
			echo"</div>";
		}
	} else {
		echo"No tiene ofertas.<BR>";
	}

	mysqli_close($conexion);

?>