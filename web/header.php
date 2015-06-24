
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
				echo"<a href='perfil.php'>Mi Perfil</a>";
				echo" | ";
				echo"<a href='subastar.php'>Subastar</a>";
				echo" | ";
				echo"<a href='modulos/cerrar.php'>Salir</a>";
				echo "</div>";
			} else {
				include ('formlogin.php');
			}
		?>
</div>