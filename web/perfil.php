<?php
	if(!session_start()){
		session_start();
	}
?>

<html>
	<head>
		<title>BESTNID: Mi Perfil</title>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link rel="icon" type="image/png" href="imagenes/favicon.png">
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
				<div class="perfil">
					<img src="imagenes/miperfil.png">
					<nav>
						<ul>
						<li><a href=''>Mis Ofertas</a></li>
						<li><a href=''>Mis Compras</a></li>
						<li><a href='perfil.php?op=subastas'>Mis Subastas</a></li>
						<li><a href='perfil.php?op=mispreguntas'>Mis Preguntas</a></li>
						<li><a href='perfil.php?op=preguntas'>Preguntas que me hicieron</a></li>	
						<li><a href=''>Configuracion de cuenta</a></li>	
						</ul>
					</nav>
					<div class="muestra">
					<?php
						if(empty($_GET)){
							echo '';
						} else {
							$op=$_GET['op'];
							switch ($op) {
							case 'ofertas':
								include 'ofertas.php';
								break;
							case 'compras':
								include 'compras.php';
								break;
							case 'subastas':
								include 'perfil/subastas.php';
								break;
							case 'mispreguntas':
								include 'perfil/mispreguntas.php';
								break;
							case 'preguntas':
								include 'perfil/preguntas.php';
								break;									
							}
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