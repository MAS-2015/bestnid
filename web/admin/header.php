
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="../imagenes/logo2.png"></a>
	</div>
	<span class="titulo">PANEL DE ADMINISTRADOR</span>
		<?php
			if (isset($_SESSION['Admin'])){
				$user= $_SESSION['Admin'];
				echo"<div class=\"login\">Bienvenido $user";
				echo"<br>";
				echo"<form method='post' action='modulos/cerrar.php'><input class=\"buttom\"  type=\"submit\" value=\"Salir\"></form>";
				echo "</div>";
			} else {
				include ('formlogin.php');
			}
		?>
</div>