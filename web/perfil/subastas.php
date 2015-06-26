<?php
function subastaTerminada($idSubasta){
	include("modulos/conexion.php");
	$sql = " SELECT `fechaFin`, Now() AS now FROM `subastas` WHERE `idSubasta` =".$idSubasta;	
	$resultado= mysqli_query($conexion, $sql);
	$fila=mysqli_fetch_assoc($resultado);
	return ($fila['fechaFin'] < $fila['now']);
}

function subastaEditable($idSubasta){
	include("modulos/conexion.php");
	$sql = "SELECT * FROM ofertas WHERE `idSubasta` = ".$idSubasta;	
	$resultadoOfertas= mysqli_query($conexion, $sql);
	$sql = "SELECT * FROM preguntas WHERE `idSubasta` = ".$idSubasta;
	$resultadoPreguntas= mysqli_query($conexion, $sql);
	if((mysqli_num_rows($resultadoOfertas) == 0) && (mysqli_num_rows($resultadoPreguntas) == 0) && !(subastaTerminada($idSubasta)) ){
		return true;
	}
	else{
		return false;
	}
}

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
	$sql="SELECT s.titulo, s.idSubasta, s.imagen, s.fechaInicio, s.fechaFin, Now() FROM subastas as s INNER JOIN usuarios as u ON (u.idUsuario=s.idUsuario) WHERE u.email='".$usr."' AND DATE(s.fechaFin)<CURDATE() AND s.idOfertaGanadora is NULL";
	$resultado = mysqli_query($conexion, $sql);
	echo "SUS SUBASTAS TERMINADAS ELIJA UN GANADOR: <BR>";
	if(mysqli_num_rows($resultado) > 0){
		while($subastas= mysqli_fetch_row($resultado)){
			echo "<div class='cajita'>";
			echo"<a href='detalles.php?id=$subastas[1]'> $subastas[0] </a>";
			echo"<br>";
			echo"<img src='$subastas[2]'>";

			echo"<div class='opc2'><a href='detalles.php?id=$subastas[1]'>VER</a></div>";			
			echo"<div class='fecha'>Fecha: $subastas[3]</div>";
			echo "</div>";
		}
		echo "<br><br>";
	} else {
		echo"No tiene subastas que requieran elegir un ganador<br><br><br>";
	}


	$sql2="SELECT s.titulo, s.idSubasta, s.imagen, s.fechaInicio, s.fechaFin, Now() FROM subastas as s INNER JOIN usuarios as u ON (u.idUsuario=s.idUsuario) WHERE u.email='".$usr."' AND DATE(s.fechaFin)>CURDATE()";

	$resultado2 = mysqli_query($conexion, $sql2);
	echo "SUS SUBASTAS ACTIVAS: <BR>";
	if(mysqli_num_rows($resultado2) > 0){
		while($subastas= mysqli_fetch_row($resultado2)){
			$terminada=($subastas[4])>$subastas[5];
			echo "<div class='cajita'>";
			echo"<a href='detalles.php?id=$subastas[1]'> $subastas[0] </a>";
			echo"<br>";
			echo"<img src='$subastas[2]'>";
			echo'<div class="semi-detalle-countdown">Tiempo para su finalizacion <br> '.($terminada?countdown(strtotime($subastas[4])):'<p>SUBASTA TERMINADA</p>').'</div>';
			echo"<div class='opc'><form method='get' action='detalles.php'> 
			<input type='hidden' name='id' value='$subastas[1]'></input><input class='buttom' type='submit' value='Ver'></input></form>";
			if (subastaEditable($subastas[1]))
				echo"
					<form method='POST' action='subastar.php'>
					<input type='hidden' name='idSubasta' value='$subastas[1]'></input>
					<input type='submit' name='modificar' class='buttom'  value='Modificar'></input> </form>"; 
			if (subastaEditable($subastas[1]))
				echo"
					<form method='POST' action='modulos/eliminarSubasta.php' onsubmit=' return confirm(\"Est&aacute; seguro?\");'>
					<input type='hidden' name='idSubasta' value='$subastas[1]'></input>
					<input type='submit' name='eliminar' class='buttom'  value='Eliminar'></input><br><br> </form>";
			echo"</div>";			
			echo"<div class='fecha'>Fecha: $subastas[3]</div>";
			echo "</div>";
		}
		echo "<br><br>";		
	} else {
		echo"No tiene subastas activas<br><br><br>";
	}

	$sql3="SELECT s.titulo, s.idSubasta, s.imagen, s.fechaInicio, s.fechaFin, Now() FROM subastas as s INNER JOIN usuarios as u ON (u.idUsuario=s.idUsuario) WHERE u.email='".$usr."' AND DATE(s.fechaFin)<CURDATE() AND s.idOfertaGanadora is not NULL";

	$resultado3 = mysqli_query($conexion, $sql3);
	echo "SUS SUBASTAS COMPLETADAS: <BR>";
	if(mysqli_num_rows($resultado3) > 0){
		while($subastas= mysqli_fetch_row($resultado3)){
			echo "<div class='cajita'>";
			echo"<a href='detalles.php?id=$subastas[1]'> $subastas[0] </a>";
			echo"<br>";
			echo"<img src='$subastas[2]'>";
		
			echo"<div class='fecha'>Fecha: $subastas[3]</div>";
			echo "</div>";
		}
		echo "<br><br><br>";		
	} else {
		echo"No tiene subastas completadas<br><br><br>";
	}

	mysqli_close($conexion);

?>