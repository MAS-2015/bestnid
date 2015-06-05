<?php
	if(!session_start()){
		session_start();
	}
?>

<html>
	<head>
		<title>BESTNID: Inicio</title>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/home.css">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/detalles.css" media="all">
		<link rel="icon" type="image/png" href="imagenes/favicon.png">
		<script src="scripts/countdown.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
	</head>


	<body>
		<div class="wrapper">
			<div class="pagina">
				<?php
					include('header.php');
				?>
				<div class="msj">
					<?php
						if(empty($_GET)){
							echo '';
						} else{
						// se imprime mensajes
							if(!(empty($_GET['msj']))){
								
								$men=($_GET['msj']);
								echo('<b>'.$men.'</b>');
							}
							   
						}
					?>	
				
				</div>
				<div class="contenedor-muestras">
					<div class="busqueda-categorias">
						<p>Categor&iacute;as:</p>
						<div>
							<?php include("/modulos/busqueda_categorias.php");?>
						</div>
					</div>
					<div class="muestra-subastas">
					<?php
						include_once("/modulos/funciones_detalle.php");
						if(isset($_GET["categoria"])){
							semi_detalles_PorCategoria(0,100,$_GET["categoria"]);
						}
						elseif(isset($_GET["titulo"])){
							semi_detalles_PorTitulo(0,100,$_GET["titulo"]);
						}
						else{
							semi_detalles_porDefecto(0,16);
						}
						
					?>
					</div>
				</div>
			</div>	
			<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
			</div>
		</div>
	</body>	
</html>