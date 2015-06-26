<?php
	if(!session_start()){
		session_start();
	}
	if(!isset($_SESSION["Admin"])){
		header('Location: index.php');
	}
?>

<html>
	<head>
		<title>BESTNID: Inicio</title>
		<link type="text/css" id="global-css" rel="stylesheet" href="../css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="../css/home.css">
		<link rel="icon" type="image/png" href="../imagenes/favicon.png">
		<link type="text/css" id="global-css" href="css/estiloadmin.css" rel="stylesheet">
		<link type="text/css" id="global-css" href="css/menu.css" rel="stylesheet"> 
		<script type="text/javascript" src="../js/login.js"></script>
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
				<div class="menu">

					<?php
						include 'menu.php';
					?>

				</div>
				<div class="operaciones">
					<?php
						$op=$_GET['op'];
						switch ($op) {
						case 'altaCat':
							include 'agregarcat.php';
							break;
						case 'bajaCat':
							include 'eliminarcat.php';
							break;
						case 'modCat':
							include 'modcategorias.php';
							break;
						case 'consultas':
							include 'consultas.php';
							break;							
						}
					?>
					
				</div>

			</div>	
			<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
			</div>
		</div>
	</body>	
</html>