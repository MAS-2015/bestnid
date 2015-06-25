<?php
	if(!session_start()){
		session_start();
	}
?>
<html>
	<head>
		<title>BESTNID: Registro</title>
		<meta charset="UTF-8">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/styles.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/subastar.css">
		<link rel="icon" type="image/png" href="imagenes/favicon.png">
		<script type="text/javascript" src="js/login.js"></script>		
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="js/validarSubasta.js"></script>
		<script type="text/javascript" src="js/formReg.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<div class="pagina">
				<?php
					include('header.php');
				?>
                <?php
					if(isset($_POST["modificar"])){
						include('formModSubasta.php');
					}
					else{
						include('formAltaSubasta.php');
					}
                ?>			
			</div>	
			<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
			</div>
		</div>
	</body>	
</html>