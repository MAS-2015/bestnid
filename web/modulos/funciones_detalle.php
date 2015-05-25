<?php

function semi_detalles_PorCategoria($inicio,$maximo,$idCategoria){
	include("/modulos/conexion.php");
	$idCategoria = mysqli_real_escape_string($conexion,$idCategoria);
	$sql = "SELECT * FROM `subastas` WHERE `fechaFin` > Now() AND `subastas`.`idCategoria` =".$idCategoria." LIMIT ".$inicio.','.$maximo;
	$resultado= mysqli_query($conexion, $sql);
	$maximo-=mysqli_num_rows($resultado);
	if(mysqli_num_rows($resultado) > 0){
		while($fila = mysqli_fetch_assoc($resultado)){
			semi_detalle($fila['idSubasta']);
		}
		if($maximo){
			$sql="SELECT * FROM `subastas` WHERE `fechaFin` < Now() AND `subastas`.`idCategoria` =".$idCategoria." ORDER BY `fechaFin` DESC LIMIT 0,".$maximo;
			$resultado= mysqli_query($conexion, $sql);
			while($fila = mysqli_fetch_assoc($resultado)){
				semi_detalle($fila['idSubasta']);
			}
		}
	}else{
		$sql = "SELECT * FROM `subastas` WHERE `fechaFin` < Now() AND `subastas`.`idCategoria` =".$idCategoria." LIMIT ".$inicio.','.$maximo;
		$resultado= mysqli_query($conexion, $sql);
		if(mysqli_num_rows($resultado) > 0){
			while($fila = mysqli_fetch_assoc($resultado)){
				semi_detalle($fila['idSubasta']);
			}
		}else{
			echo 'No se han encontrado resultados de esa categor&iacute;a';
		}
	}
}

function semi_detalles_PorTitulo($inicio,$maximo,$titulo){
	include("/modulos/conexion.php");
	$titulo = mysqli_real_escape_string($conexion,$titulo);
	$sql = "SELECT * FROM `subastas` WHERE `fechaFin` > Now() AND `subastas`.`titulo`LIKE '%".$titulo."%' ORDER BY `fechaFin` DESC LIMIT ".$inicio.','.$maximo;
	$resultado= mysqli_query($conexion, $sql);
	$maximo-=mysqli_num_rows($resultado);
	if(mysqli_num_rows($resultado) > 0){
		while($fila = mysqli_fetch_assoc($resultado)){
			semi_detalle($fila['idSubasta']);
		}
		if($maximo){
			$sql="SELECT * FROM `subastas` WHERE `fechaFin` < Now() AND `subastas`.`titulo`LIKE '%".$titulo."%' ORDER BY `fechaFin` DESC LIMIT 0,".$maximo;
			$resultado= mysqli_query($conexion, $sql);
			while($fila = mysqli_fetch_assoc($resultado)){
				semi_detalle($fila['idSubasta']);
			}
		}
	}else{
		$sql = "SELECT * FROM `subastas` WHERE `fechaFin` < Now() AND `subastas`.`titulo`LIKE '%".$titulo."%' ORDER BY `fechaFin` DESC LIMIT ".$inicio.','.$maximo;
		$resultado= mysqli_query($conexion, $sql);
		if(mysqli_num_rows($resultado) > 0){
			while($fila = mysqli_fetch_assoc($resultado)){
				semi_detalle($fila['idSubasta']);
			}
		}else{
			echo 'No se han encontrado resultados de esa categor&iacute;a';
		}
	}
}

function semi_detalles_porDefecto($inicio,$maximo){
	include("/modulos/conexion.php");
	$sql="SELECT * FROM `subastas` WHERE `fechaFin` > Now() ORDER BY `fechaFin` LIMIT ".$inicio.','.$maximo;
	$resultado= mysqli_query($conexion, $sql);
	$maximo-=mysqli_num_rows($resultado);
	while($fila = mysqli_fetch_assoc($resultado)){
		semi_detalle($fila['idSubasta']);
	}
	if($maximo){
		$sql="SELECT * FROM `subastas` WHERE `fechaFin` < Now() ORDER BY `fechaFin` DESC LIMIT 0,".$maximo;
		$resultado= mysqli_query($conexion, $sql);
		while($fila = mysqli_fetch_assoc($resultado)){
			semi_detalle($fila['idSubasta']);
		}
	}
}

function semi_detalle($idSubasta){
	include("/modulos/conexion.php");
	$sql = "SELECT `idSubasta`,`fechaFin`,`titulo`,`imagen`, Now() AS now FROM `subastas` WHERE `subastas`.`idSubasta` =".$idSubasta;
	$resultado= mysqli_query($conexion, $sql);
	$fila = mysqli_fetch_assoc($resultado);
	$terminada=($fila['fechaFin'])>$fila['now'];
	echo'
		<div class="semi-detalle-container">
			<a href="detalles?id='.$fila['idSubasta'].'">
				<div class="semi-detalle-imagen"><img src="'. $fila['imagen'].'"></div>
				<div class="semi-detalle-titulo"><span>'.$fila['titulo'].'</span></div>
				<div class="semi-detalle-countdown">'.($terminada?countdown(strtotime($fila['fechaFin'])):'<p>SUBASTA TERMINADA</p>').'</div>
			</a>
		</div>';
}

function countdown($time){
	$contador='
		<script>
			var pageCountdown = new Countdown({				
				style:"flip",
			 	year	: '. date('Y', $time).',month	: '.date('m', $time).', day		: '.date('d', $time).',	hour   :0,minute   : 0,seconds   : 0,
				width	: 200, height	: 28,
				interval : 100, rangeHi:"day", 
				labelText :{ second 	: "seg", minute 	: "min", hour	: "hs", day 	: "D&iacute;as"}
				});
		</script>	
		';
	return $contador;
}
?>