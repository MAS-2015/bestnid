<?php
	if(!session_start()){
		session_start();
	}
?>

<html>
	<head>
	<?php
	include("/modulos/conexion.php");
	include("/modulos/funciones_detalle.php");
	
	$tituloSubasta="";
	$idSubasta=-1;
	if (isset($_GET['id'])){
		if(is_numeric($_GET['id'])){
			$sql = "SELECT `titulo` FROM `subastas` WHERE `idSubasta` = ".$_GET['id'] ;
			$resultado= mysqli_query($conexion, $sql);
			if( mysqli_num_rows($resultado) == 1){
				$fila = mysqli_fetch_assoc($resultado);
				$tituloSubasta= $fila["titulo"];
				$idSubasta=$_GET['id'];
			}
		}
	}
	?>
		<title>BESTNID: <?php echo ($idSubasta== -1? 'Subasta no encontrada':$tituloSubasta); ?></title>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/home.css">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/detalles.css" media="all">
		<link rel="icon" type="image/png" href="imagenes/favicon.png">
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script src="scripts/countdown.js"></script>
		<script type="text/javascript" src="js/ofertar.js"></script>
		<script type="text/javascript" src="js/preguntasYRespuestas.js"></script>
		<script type="text/javascript" src="js/login.js"></script>	
	</head>


	<body>
		<div class="wrapper">
			<div class="pagina">
				<?php
					include('header.php');
				?>

				<div class="info-subasta">
				<?php
					if($idSubasta == -1){
						echo '<h2>Subasta no encontrada</h2>';
					}else{
						get_info_producto($idSubasta);
					}
				?>
				</div>
				<div class="preguntas-subasta" id="preguntasSubasta">
					<span>Preguntas y Respuestas:</span><br>
				<?php
					if($idSubasta != -1){
						include("modulos/preguntasyrespuestas.php");
					}

					if(isset($user)){
						$idUsuarioSubasta= buscarIdUsuarioPorIdSubasta($idSubasta);
						$idUsuario = buscarIdUsuarioPorEmail($user);
						
						if($idUsuarioSubasta != $idUsuario){	
							include("preguntas.php");
						}
					}

				?>
				</div>
			</div>	
		</div>
	</body>	
</html>