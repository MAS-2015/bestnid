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
	}
}

function semi_detalles_PorTitulo($inicio,$maximo,$titulo){
	include("/modulos/conexion.php");
	$titulo = mysqli_real_escape_string($conexion,$titulo);
	if (strlen($titulo) < 3){
		echo 'Su b&uacute;squeda fue muy poco espec&iacute;fica. Por favor haga una b&uacute;squeda m&aacute;s detallada';
	}
	else{
		echo 'Resultados de b&uacute;squeda para: '.$titulo.'<br>';
		$busqueda=explode(" ",$titulo);
		
		$select = "SELECT * FROM `subastas` ";
		$where =" WHERE `fechaFin` > Now() AND ( ";
		$titulos="";
		
		$sacar= array('a', 'al', 'el', 'la', 'las', 'lo', 'los', 'un', 'una', 'uno', 'unos', 'de', 'del', ' ','' ) ;
		$busqueda = array_diff($busqueda,$sacar);
		reset($busqueda);
		$primero=current($busqueda);
		$titulos = $titulos . " `titulo` LIKE '%".$primero."%' ";
		foreach( $busqueda as $val){
			$titulos = $titulos . " OR `titulo` LIKE '%".$val."%' ";
		}
		$titulos = $titulos . ")";
		$orden = "ORDER BY `fechaFin` ASC ";
		$sql= $select.$where.$titulos.$orden." LIMIT ".$inicio.','.$maximo;
		$resultado= mysqli_query($conexion, $sql);
		$maximo-=mysqli_num_rows($resultado);
		if(mysqli_num_rows($resultado) > 0){
			while($fila = mysqli_fetch_assoc($resultado)){
				semi_detalle($fila['idSubasta']);
			}
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
				<div class="semi-detalle-titulo"><span>'.utf8_decode($fila['titulo']).'</span></div>
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
				width	: 200, height	: 40,
				interval : 100, rangeHi:"day", rangeLo  : "minute",
				labelText :{ second 	: "seg", minute 	: "min", hour	: "hs", day 	: "D&iacute;as"}
				});
		</script>	
		';
	return $contador;
}

function get_info_producto($idSubasta){
	include("/modulos/conexion.php");
	$sql = " SELECT `idSubasta`,`fechaInicio`,`fechaFin`,`titulo`,`descripcion`,`imagen`,`idCategoria`,`idUsuario`, Now() AS now FROM `subastas` WHERE `idSubasta` =".$idSubasta;	
	$resultado= mysqli_query($conexion, $sql);
	$fila = mysqli_fetch_assoc($resultado);
	$sqlCategoria="SELECT * FROM `categorias` WHERE `idCategoria` = ". $fila["idCategoria"];
	$resultado= mysqli_query($conexion, $sqlCategoria);
	$categoria= mysqli_fetch_assoc($resultado);
	$terminada=($fila['fechaFin'])<$fila['now'];
	echo'
		<h1 class="titulo">'.utf8_decode($fila["titulo"]).'</h1>
		<img src="'. utf8_decode($fila['imagen']).'">
		<div class="info-lateral">
			<span>Fecha publicaci&oacute;n: </span> '.$fila["fechaInicio"].'<br>
			<span>Fecha cierre de subasta: </span> '.$fila["fechaFin"].'<br>
			<span>Tiempo restante de subasta: </span> <br>
			<div class="contenedor-countdown"><div class="detalle-countdown">'.(!$terminada?countdown(strtotime($fila['fechaFin'])):'<p>SUBASTA TERMINADA</p>').'</div></div>
			<br>
			<span>Categor&iacute;a:</span> <a class="link-categoria" style="float:none;" href="index.php?categoria='.$categoria["idCategoria"].'" >'.$categoria["nombre"].'</a><br><br>
			';
		echo '
		</div>
		<div class="info-descripcion">
			<span>Descripci&oacute;n:</span><br>
			<p>
				'.utf8_decode($fila["descripcion"]).'
			</p>
		</div><br>
		';
		echo '<div class="oferta" id="oferta">
		';
		if(isset($_SESSION["Usuario"])){
			$idUsuario=buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
			if(buscarIdUsuarioPorIdSubasta($idSubasta) == $idUsuario ){
				if($terminada){
					echo '
					<form action=""><br>
					<input type="hidden" name="id" value="'.$idSubasta.'">
					</input><input class="buttom" type="submit" value="Elegir ganador" ></input>
					</form><br>
					';
				}
			}
			elseif(!$terminada){
				$oferta=usuarioOfertoEn($idUsuario,$idSubasta);
				if($oferta){
					echo '<button class="buttom" onclick="getFormOfertaEdit('.$oferta.')" >Ver/Editar oferta</button><br>';
				}
				else{
					echo '<button class="buttom" onclick="getFormOferta()" >Ofertar</button><br>';
				}
			}
		}
		echo '</div>';
}

function usuarioOfertoEn($idUsuario,$idSubasta){
	include("modulos/conexion.php");
	$sql = "SELECT * FROM `ofertas` WHERE `idUsuario` = '".$idUsuario."' AND `idSubasta`='".$idSubasta."'";
	$resultado = mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado) == 1 ){
		$fila = mysqli_fetch_assoc($resultado);
		return $fila["idOferta"];
	}else{
		return false;
	}
}

function get_PreguntasYRespuestas_producto($idSubasta){
	//implementar mas tarde
	echo 'PROXIMAMENTE';
}
function buscarIdUsuarioPorEmail($user){
	include("modulos/conexion.php");
	$sql = "SELECT `idUsuario` FROM `usuarios` WHERE `email` ='".$user."'";
	$resultado = mysqli_query($conexion,$sql);
	$fila = mysqli_fetch_row($resultado);
	return $fila[0];

}
function buscarIdUsuarioPorIdSubasta($idSubasta){
	include("modulos/conexion.php");
	$sql = "SELECT `idUsuario` FROM `subastas` WHERE `IdSubasta` =".$idSubasta;
	$resultado = mysqli_query($conexion,$sql);
	$fila = mysqli_fetch_row($resultado);
	return $fila[0];

}

?>