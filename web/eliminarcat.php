<html>
	<head>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/registro.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<script type="text/javascript" src="js/validarCategoria.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<div class="registro">
				<p class="infoR">Seleccionar categoria a eliminar</p>
				<form method="post" action="eliminarcat.php" onsubmit="return validarSelector('selector')">
					<?php 
					include("modulos/eli_categoria.php");
					include("modulos/selector_categorias.php");
					?>
					<input type="submit"  value="Eliminar" name="boton"/><br><br>
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
