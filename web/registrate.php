<?php
	if(!session_start()){
		session_start();
	}
	if(isset($_SESSION["Usuario"])){
		header('Location: index.php');
	}
?>
<html>
	<head>
		<title>BESTNID: Registro</title>
		<meta charset="UTF-8">
		<script type="text/javascript" src="js/formReg.js"></script>
		<script type="text/javascript" src="js/numeros.js"></script>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/styles.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/registro.css">
		<link rel="icon" type="image/png" href="imagenes/favicon.png">
		<script type="text/javascript" src="js/login.js"></script>		
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
		<script type="text/javascript">
			$(document).ready(function() {    
    			$('#nombre').blur(function(){
					$('#Info3').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1000);
        			var nombre = $(this).val();        
        			var dataString = 'nombre='+nombre;
					$.ajax({
						type: "POST",
						url: "modulos/check_nombre.php",
						data: dataString,
						success: function(data) {
							$('#Info3').fadeIn(1000).html(data);	
						}
					});	
				});              
			});    
		</script>
		<script type="text/javascript">
			$(document).ready(function() {    
    			$('#pass').blur(function(){
					$('#Info4').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1000);
        			var pass = $(this).val();        
        			var dataString = 'pass='+pass;
					$.ajax({
						type: "POST",
						url: "modulos/check_pass.php",
						data: dataString,
						success: function(data) {
							$('#Info4').fadeIn(1000).html(data);	
						}
					});
					
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
				$('#Info5').html('<div id="Error">Las contraseñas no coinciden</div>');
			}else{
				$('#Info5').html('<div id="Success">Contraseña valida</div>');
			}
		} else {
			$('#Info5').html('<div id="Error">Contraseña invalida</div>');
		}
		$('#Info5').fadeIn(1).html(data);
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
    			$('#domicilio').blur(function(){
					$('#Info7').html('<img src="imagenes/loader.gif" alt=""/>').fadeOut(1000);

        			var dom = $(this).val();        
        			var dataString = 'dom='+dom;
					
					$.ajax({
						type: "POST",
						url: "modulos/check_dom.php",
						data: dataString,
						success: function(data) {

							$('#Info7').fadeIn(1000).html(data);
							
						}
					});
					
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