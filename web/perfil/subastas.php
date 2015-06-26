<?php
function countdown($time){
	$contador='
		<script>
			var pageCountdown = new Countdown({				
				style:"flip",
			 	year	: '. date('Y', $time).',month	: '.date('m', $time).', day		: '.date('d', $time).',	hour   :0,minute   : 0,seconds   : 0,
				width	: 200, height	: 40,
				interval : 100, rangeHi:"day", rangeLo  : "minute",
				labelText :{ second 	: "seg", minute 	: "min", hour	: "hs", day 	: "D&iacute;as"}
				});
		</script>	
		';
	return $contador;
}


	include("modulos/conexion.php");
	$usr=$_SESSION['Usuario'];
	$sql="SELECT s.titulo, s.idSubasta, s.imagen, s.fechaInicio, s.fechaFin, Now() FROM subastas as s INNER JOIN usuarios as u ON (u.idUsuario=s.idUsuario) WHERE u.email='".$usr."'";

	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) > 0){
		while($subastas= mysqli_fetch_row($resultado)){
			$terminada=($subastas[4])>$subastas[5];
			echo "<div class='cajita'>";
			echo"<a href='detalles.php?id=$subastas[1]'> $subastas[0] </a>";
			echo"<br>";
			echo"<img src='$subastas[2]'>";
			echo'<div class="semi-detalle-countdown">Tiempo para su finalizacion <br> '.($terminada?countdown(strtotime($subastas[4])):'<p>SUBASTA TERMINADA</p>').'</div>';
			echo"<div class='opc'><a href='detalles.php?id=$subastas[1]'>VER</a> | 
			<a href=''>EDITAR</a> | <a href=''>ELIMINAR</a></div>";			
			echo"<div class='fecha'>Fecha: $subastas[3]</div>";
			echo "</div>";
		}
	} else {
		echo"Todavia no subasto ningun producto";
	}
	mysqli_close($conexion);

?>