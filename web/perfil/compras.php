<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['id'];
	$sql="SELECT s.titulo, s.idSubasta, o.motivo, o.precio,s.imagen, o.fecha FROM ofertas as o INNER JOIN usuarios as u ON (o.idUsuario=u.idUsuario) INNER JOIN subastas as s ON (o.idOferta=s.idOfertaGanadora) WHERE u.idUsuario=$usr";
	$resultado = mysqli_query($conexion, $sql);
	echo "SUS SUBASTAS GANADAS: <BR>";
	if(mysqli_num_rows($resultado) > 0){
		while($ofertas= mysqli_fetch_row($resultado)){
			echo"<div class='cajita'>";
			echo"Su Compra fue: $ofertas[2] <br>Con un valor de $ofertas[3] $ <br>En la subasta";
			echo"<a href='detalles.php?id=$ofertas[1]'> $ofertas[0] </a>";
			echo"<img src='$ofertas[4]'>";
			echo"<div class='fecha'>Fecha: $ofertas[5]</div>";
			echo"</div>";
		}
	} else {
		echo"Todavia no gano ninguna subasta";
	}
	mysqli_close($conexion);

?>


