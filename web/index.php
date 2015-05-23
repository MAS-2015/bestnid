<html>
	<head>
		<title>BESTNID: Inicio</title>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/home.css">
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