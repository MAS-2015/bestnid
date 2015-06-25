<?php
	if(!session_start()){
		session_start();
	}

include("/modulos/conexion.php");
include("/modulos/funciones_detalle.php");

$idSubasta=-1;
if (isset($_POST['idSubasta']) && isset($_SESSION["Usuario"])){
		if(is_numeric($_POST['idSubasta'])){
			$idUsuario=buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
			if($idUsuario == buscarIdUsuarioPorIdSubasta($_POST['idSubasta'])){
			$idSubasta = $_POST['idSubasta'];
			}
		}
	}

if($idSubasta == -1){
	echo 'Usted no puede ver ofertas de esta subasta';
}
else{
	echo '<p>Ofertas:</p>
	<link type="text/css" id="global-css" rel="stylesheet" href="css/ganador.css">
	<form id="FGan" action="modulos/ganador.php" target="_self" class="oferta" method="POST" >
	<input type="hidden" name="idSubasta" value="'.$idSubasta.'"></input>
	';
	$sql="SELECT * FROM ofertas WHERE idSubasta='".$idSubasta."'";
	$resultadoOfertas= mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultadoOfertas) >0){
		while($oferta = mysqli_fetch_assoc($resultadoOfertas)){
			echo '
			<fieldset>
				<p>'.utf8_encode($oferta["motivo"]).'</p>
				';
				if( subastaTerminada($idSubasta)){
					echo '<input type="button" onclick="elegirGanador(\''.$oferta["idOferta"].'\');" class="buttom" value="Elegir como oferta ganadora"></input>
					';
				}
			echo'
			</fieldset>
			';
		}
		echo '
		</form>
		';
	}
	else{
		echo '<p>No hay ofertas para mostrar</p>
		';
	}
}
?>