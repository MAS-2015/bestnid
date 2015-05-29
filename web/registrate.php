<html>
	<head>
		<title>BESTNID: Registro</title>
		<script type="text/javascript" src="js/formReg.js"></script>
		<script type="text/javascript" src="js/numeros.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/styles.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/registro.css">
		<link rel="icon" type="image/png" href="imagenes/favicon.png">
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function() {    
    			$('#email').blur(function(){
					$('#Info').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1000);

        			var email = $(this).val();        
        			var dataString = 'email='+email;
					
					$.ajax({
						type: "POST",
						url: "modulos/check_email.php",
						data: dataString,
						success: function(data) {

							$('#Info').fadeIn(1000).html(data);
							
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
						url: "modulos/check_tarj.php",
						data: dataString,
						success: function(data) {

							$('#Info2').fadeIn(1000).html(data);
							
						}
					});
					
				});              
			});    
		</script>		

        
		<script src="scripts/countdown.js"></script>
	</head>


	<body>
		<div class="wrapper">
			<div class="pagina">
				<?php
					include('header.php');
				?>

                <?php
                    include('formRegistro.php');
                ?>
				
			</div>	
			<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
			</div>
		</div>
	</body>	
</html>