<html>
	<head>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/registro.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<script type="text/javascript" src="js/validarCategoria.js"></script> 
	</head>
	<body>
		<div class="wrapper">
			<div class="registro">
				<p class="infoR">Seleccionar categoria a modificar</p>
				<form method="post" action="modcategorias.php" onsubmit ="return validarSelectorYCategoria('categoria','selector')">
					<?php 
					include("modulos/modificar_categoria.php");
					include("modulos/selector_categorias.php");
					?>
					<br><br>
					<p >Ingresar modificacion</p> <br><br>
					<input type="text" name="nombre" id="categoria"/><br><br>
					<input type="submit"  value="Modificar" name="boton"/ class="buttom"><br><br>
					<?php
						if(isset($salida)){
							echo "$salida";
	}
					?>
			</form>
			</div>
		</div>
		<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
		</div>

	</body>
</html>
