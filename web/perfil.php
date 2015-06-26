<?php
	if(!session_start()){
		session_start();
	}
	if(!isset($_SESSION["Usuario"])){
		header('Location: index.php');
	}
?>

<html>
	<head>
		<title>BESTNID: Mi Perfil</title>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<script type="text/javascript" src="js/formReg.js"></script>
		<script type="text/javascript" src="js/numeros.js"></script>		
		<link type="text/css" id="global-css" rel="stylesheet" href="css/ajustes.css" media="all">		
		<link type="text/css" id="global-css" rel="stylesheet" href="css/perfil.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/styles.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/home.css">		
		<link rel="icon" type="image/png" href="imagenes/favicon.png">
		<script src="scripts/countdown.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript">
		function pulsar(e) {
		  tecla = (document.all) ? e.keyCode : e.which;
		  return (tecla != 13);
		}
		</script>
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('#nombre').blur(function(){
				$('#Info3').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1);
				var nombre = $('#nombre').val();
				if(nombre != '' && nombre.length > 6){
						$('#Info3').html('<div id="Success">Nombre correcto</div>');
					} else {
					$('#Info3').html('<div id="Error">Nombre invalido, muy corto</div>');
				}
				$('#Info3').fadeIn(1).html(data);
			});
		});
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('#domicilio').blur(function(){
				$('#Info7').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1);
				var dom = $('#domicilio').val();
				if(dom != ''){
					if(dom.length > 4){
						$('#Info7').html('<div id="Success">Domicilio correcto</div>');
					} else {
						$('#Info7').html('<div id="Error">Domicilio invalido, muy corto</div>');
				} 
				} else {
					$('#Info7').html('');
				}
				$('#Info7').fadeIn(1).html(data);
			});
		});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {    
    			$('#tel').blur(function(){
					$('#Info6').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1000);
        			var telefono = $(this).val();        
        			var dataString = 'telefono='+telefono;
					$.ajax({
						type: "POST",
						url: "modulos/check_tel.php",
						data: dataString,
						success: function(data) {

							$('#Info6').fadeIn(1000).html(data);
							
						}
					});
				});              
			});    
		</script>
		<script type="text/javascript">
			
			$(document).ready(function() {    
    			$('#tarj').blur(function(){
					$('#Info2').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1000);
        			var tarj = $(this).val();        
        			var dataString = 'tarj='+tarj;
					$.ajax({
						type: "POST",
						url: "modulos/check_tarj2.php",
						data: dataString,
						success: function(data) {
							$('#Info2').fadeIn(1000).html(data);
						}
					});
				});              
			});    
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('#pass').blur(function(){
				$('#Info4').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1);
				var pass = $('#pass').val();
				if(pass.length > 5){
						$('#Info4').html('<div id="Success">Contrase&ntilde;a correcta</div>');
				} else {
					$('#Info4').html('<div id="Error2">Contrase&ntilde;a invalida, muy corta</div>');
				} 
				$('#Info4').fadeIn(1).html(data);
			});
		});
		</script>		
		<script type="text/javascript">
		$(document).ready(function() {
			$('#passconf').blur(function(){
				$('#Info5').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1);
				var pass = $('#pass').val();
				var passconf = $('#passconf').val();
				if(pass != '' && passconf != '' && pass.length > 5){
					if(pass != passconf){
						$('#Info5').html('<div id="Error2">Las contrase&ntildeas no coinciden</div>');
					}else{
						$('#Info5').html('<div id="Success">Contrase&ntilde;a valida</div>');
					}
				} else {
					$('#Info5').html('<div id="Error2">Contrase&ntilde;a invalida</div>');
				}
				$('#Info5').fadeIn(1).html(data);
			});
		});
		</script>			
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
					<img id="mp" src="imagenes/miperfil.png">
					<div class="menup">
						<nav>
							<ul>
							<li><a href='perfil.php?op=ofertas'>Mis Ofertas</a></li>
							<li><a href='perfil.php?op=compras'>Mis Compras</a></li>
							<li><a href='perfil.php?op=subastas'>Mis Subastas</a></li>
							<li><a href='perfil.php?op=mispreguntas'>Mis Preguntas</a></li>
							<li><a href='perfil.php?op=preguntas'>Preguntas que me hicieron</a></li>	
							<li><a href='perfil.php?op=ajustes'>Configuracion de cuenta</a></li>	
							</ul>
						</nav>
					</div>	
					<div class="muestra">
					<?php
						if(empty($_GET)){
							echo '';
						} else {
							if(!(empty($_GET['op']))){
								$op=$_GET['op'];
								switch ($op) {
								case 'ofertas':
									include 'perfil/ofertas.php';
									break;
								case 'compras':
									include 'perfil/compras.php';
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
								case 'ajustes':
									include 'perfil/ajustes.php';
									break;									
								}
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