<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['Usuario'];
	$sql="SELECT p.pregunta, s.titulo, s.idSubasta FROM preguntas as p INNER JOIN  subastas as s ON (s.idSubasta=p.idSubasta) INNER JOIN usuarios as u ON (s.idUsuario=u.idUsuario) WHERE u.email='".$usr."'";
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) > 0){
		while($preguntas= mysqli_fetch_row($resultado)){
			echo"<a href='detalles.php?id=$preguntas[2]'> $preguntas[0] en $preguntas[1] </a>";
		}
	} else {
		echo"Todavia no le hicieron preguntas";
	}
	mysqli_close($conexion);

?>