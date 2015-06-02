
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="imagenes/logo2.png"></a>
	</div>	
		<?php
			
			if (isset($_SESSION['Usuario'])){}else{
				include ('botonregistro.php');
			}
		?>
		<?php
			include ('busqueda_titulo.php');
		?>
		<?php
			if (isset($_SESSION['Usuario'])){
				$user= $_SESSION['Usuario'];
				echo"<div class=\"login\">Bienvenido $user";
				echo"<br>";
				echo"<form method='post' action='modulos/cerrar.php'><input class=\"buttom\"  type=\"submit\" value=\"Salir\"></form>";
				echo "</div>";
			} else {
				include ('formlogin.php');
			}
		?>
</div>