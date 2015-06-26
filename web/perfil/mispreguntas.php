<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['Usuario'];
	$sql="SELECT p.pregunta, s.titulo, s.idSubasta, s.imagen, p.fecha FROM preguntas as p INNER JOIN usuarios as u ON (u.idUsuario=p.idUsuario) INNER JOIN subastas as s ON (s.idSubasta=p.idSubasta) WHERE u.email='".$usr."'";
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) > 0){
		while($preguntas= mysqli_fetch_row($resultado)){
			echo"<div class='cajita'>";
			echo"Tu pregunta: $preguntas[0] en ";
			echo"<a href='detalles.php?id=$preguntas[2]'> $preguntas[1] </a>";
			echo"<br>";
			echo"<img src='$preguntas[3]'>";
			echo"<div class='opc2'><a href='detalles.php?id=$preguntas[2]'>VER</a></div>";		
			echo"<div class='fecha'>Fecha: $preguntas[4]</div>";
			echo"</div>";
		}
	} else {
		echo"Todavia no realizo ninguna pregunta";
	}
	mysqli_close($conexion);

?>