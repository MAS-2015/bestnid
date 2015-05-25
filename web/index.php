<html>
	<head>
		<title>BESTNID: Inicio</title>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/home.css">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/detalles.css" media="all">
		<script src="scripts/countdown.js"></script>
	</head>


	<body>
		<div class="wrapper">
			<div class="pagina">
				<div class="login">
					<img src="imagenes/logo2.png" height="45">
					<a  class="buttom" href="/bestnid/registrate.php">REGISTRATE GRATIS</a>
					
					<?php
						include ('login.php');
					?>
				</div>
				<div class="busqueda">
					<?php
						include ('busqueda_titulo.php');
					?>
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
				<div class="busqueda-categorias">
					<p>Categor&iacute;as:</p>
					<div>
						<?php include("/modulos/busqueda_categorias.php");?>
					</div>
				</div>
			</div>	
			<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
			</div>
		</div>
	</body>	
</html>