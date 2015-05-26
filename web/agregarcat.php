
<html>
	<head>
	<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
	<link type="text/css" id="global-css" rel="stylesheet" href="css/registro.css" media="all">
	</head>
	

	</body>
		<div class="wrapper">
			<div class="registro">
				<p class="infoR"> ingresar nueva categoria</p>
				<form method="post" name"form1" action="agregarcat.php"> 
  
  					<input type="text" name='nombre'/> <br> <br>
  					<input type="submit" name="boton" value="confirmar"/> 

  				</form>
  				 <?php
  				 	include("modulos/agregar_categoria.php");
  				  ?>
				</div>
		
		</div>
		

		<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
		</div>
	</body>

</html>