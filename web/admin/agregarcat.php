
<html>
	<head>
	<link type="text/css" id="global-css" rel="stylesheet" href="../css/header.css" media="all">
	<link type="text/css" id="global-css" rel="stylesheet" href="../css/registro.css" media="all">
	<link type="text/css" id="global-css" rel="stylesheet" href="../css/styles.css" media="all">
	 <script type="text/javascript" src="../js/validarCategoria.js"></script> 
	</head>
	


	<body>

		<div class="wrapper">
			<div class="registro">
				<p class="infoR"> Ingresar nueva categor&iacute;a</p>
				<form method="post" name"form1" action="operacion.php?op=altaCat" onsubmit ="return validarCategoria('categoria')">  
  					<input type="text" name='nombre' id="categoria" placeholder="nueva categoria"/> <img src="../imagenes/ayuda.png"  Title="* M&iacute;nimo 3 caracteres. No se permiten caracteres especiales.M&aacute;ximo 2 palabras por categor&iacute;a" ><br> <br>
  					<input type="submit" name="boton" value="confirmar" class="Buttom"/> 
  					<div id="salida"></div>

  				</form>
  				 <?php
  				 	include("modulos/agregar_categoria.php");
  				  ?>
				</div>
		</div>
		

		
	</body>

</html>