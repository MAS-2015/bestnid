<html>
	<head>
		<title>BESTNID: Inicio</title>
		<link type="text/css" id="global-css" rel="stylesheet" href="css/header.css" media="all">
		<link type="text/css" id="global-css" rel="stylesheet" href="css/registro.css" media="all">
	</head>


	<body>
		<div class="wrapper">
			<div class="pagina">
				<div class="login">
				<img src="imagenes/logo2.png" height="45">

					<?php
						include ('login.php');
					?>
				</div>
				<div class="registro">
						<p class="infoR">COMPLETE LOS DATOS INDICADOS PARA CREARSE UNA CUENTA</p>
						<form>
							E-mail: <input type="text" name="email" value="@"><span class="oblig">*</span><br><br>
							Contrase&ntilde;a: <input type="password" name="pass"><span class="oblig">*</span><br><br>
							Nombre y Apellido: <input type="text" name="nomyApe"><span class="oblig">*</span><br><br>
							Numero de Tarjeta: <input type="number" name="nroTarj"><span class="oblig">*</span><br><br>
							Numero de Telefono: <input type="number" name="nroTel"><br><br>
							Domicilio: <input type="text" name="domicilio"><br><br>
							<input type="submit" value="Registrarse" class="buttom">
						</form>
				</div>
			</div>	

			<div class="footer">
				Copyright &copy; 2015 - Desarrollo Grupo MAS
			</div>
		</div>	
	</body>

</html>