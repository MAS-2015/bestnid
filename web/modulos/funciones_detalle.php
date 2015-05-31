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
			<a href="detalles.php?id='.$fila['idSubasta'].'">
				<div class="semi-detalle-imagen"><img src="'. $fila['imagen'].'"></div>
				<div class="semi-detalle-titulo"><span>'.$fila['titulo'].'</span></div>
				<div class="semi-detalle-countdown">'.($terminada?countdown(strtotime($fila['fechaFin'])):'<p>SUBASTA TERMINADA</p>').'</div>
			</a>
		</div>
		';
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

function get_info_producto($idSubasta){
	include("/modulos/conexion.php");
	$sql = " SELECT `idSubasta`,`fechaInicio`,`fechaFin`,`titulo`,`descripcion`,`imagen`,`idCategoria`,`idUsuario`, Now() AS now FROM `subastas` WHERE `idSubasta` =".$idSubasta;
	//$sql = "SELECT `idSubasta`,`fechaInicio`,`fechaFin`,`titulo`,`imagen`, `subastas`.`idCategoria`, `categorias`.`nombre`, `nombreApellido` , Now() AS now FROM `subastas` INNER JOIN `usuarios` ON `subastas`.`idUsuario` = `usuarios`.`idUsuario` INNER JOIN `categorias`ON `categorias`.`idCategoria` = `subastas`.`idCategoria` WHERE `subastas`.`idSubasta` =".$idSubasta;
	$resultado= mysqli_query($conexion, $sql);
	$fila = mysqli_fetch_assoc($resultado);
	$sqlUser = "SELECT `nombreApellido` FROM `usuarios` WHERE `idUsuario` = " .$fila["idUsuario"];
	$nombreUsuario= mysqli_fetch_assoc( mysqli_query($conexion, $sqlUser))["nombreApellido"];
	$sqlCategoria="SELECT * FROM `categorias` WHERE `idCategoria` = ". $fila["idCategoria"];
	$resultado= mysqli_query($conexion, $sqlCategoria);
	$categoria= mysqli_fetch_assoc($resultado);
	$terminada=($fila['fechaFin'])>$fila['now'];
	echo'
		<h1 class="titulo">'.$fila["titulo"].'</h1>
		<img src="'. $fila['imagen'].'">
		<div class="info-lateral">
			<span>Subastador:</span> '.$nombreUsuario.'<br>
			<span>Fecha publicaci&oacute;n: </span> '.$fila["fechaInicio"].'<br>
			<span>Fecha cierre de subasta: </span> '.$fila["fechaFin"].'<br>
			<span>Tiempo restante de subasta: </span> <br>
			<div class="contenedor-countdown"><div class="detalle-countdown">'.($terminada?countdown(strtotime($fila['fechaFin'])):'<p>SUBASTA TERMINADA</p>').'</div></div>
			'.($terminada?'<form><input class="buttom" type="button" href="#" value="Ofertar" ></input></form><br>':'').'
			<br>
			<span>Categor&iacute;a:</span> <a class="link-categoria" style="float:none;" href="index.php?categoria='.$categoria["idCategoria"].'" >'.$categoria["nombre"].'</a><br>
		</div>
		<div class="info-descripcion">
			<span>Descripci&oacute;n:</span><br>
			<p>
				'.$fila["descripcion"].'
			</p>
		</div>';
}
function get_PreguntasYRespuestas_producto($idSubasta){
	//implementar mas tarde
	echo 'PROXIMAMENTE';
}
?>