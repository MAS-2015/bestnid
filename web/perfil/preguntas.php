<?php
	include("modulos/conexion.php");
	$usr=$_SESSION['Usuario'];
	$sql="SELECT p.pregunta, s.titulo, s.idSubasta, s.imagen, p.fecha FROM preguntas as p INNER JOIN  subastas as s ON (s.idSubasta=p.idSubasta) INNER JOIN usuarios as u ON (s.idUsuario=u.idUsuario) WHERE u.email='".$usr."'AND DATE(s.fechaFin)>CURDATE()";
	echo "PREGUNTAS QUE TIENE EN SUS SUBASTAS ACTIVAS: <BR>";
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) > 0){
		while($preguntas= mysqli_fetch_row($resultado)){
			echo"<div class='cajita'>";
			echo"Te preguntaron: $preguntas[0] en ";
			echo"<a href='detalles.php?id=$preguntas[2]'> $preguntas[1] </a>";
			echo"<br>";
			echo"<img src='$preguntas[3]'>";
echo"<div class='opc2'><form method='get' action='detalles.php'> 
			<input type='hidden' name='id' value='$preguntas[2]'></input><input class='buttom' type='submit' value='Ver/Responder'></input></form></div>";		
			echo"<div class='fecha'>Fecha: $preguntas[4]</div>";
			echo"</div>";
		}
	} else {
		echo"Todavia no le hicieron preguntas";
	}
	mysqli_close($conexion);

?>