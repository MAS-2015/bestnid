<?php
	if(!session_start()){
		session_start();
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
				<div class="menu">

					<?php
						if (isset($_SESSION['Admin'])){
							include ('menu.php');
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