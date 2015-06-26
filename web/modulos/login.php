<?php
	$user= addslashes($_POST['email']);
	$pass= addslashes($_POST['pass']);
	include('conexion.php');
	$sql="SELECT idUsuario FROM usuarios WHERE email='".$user."' AND password='".$pass."'";
	$result=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_row($result);
	if(mysqli_num_rows($result) > 0){
		session_start();
		$_SESSION['Usuario'] = $user;
		$_SESSION['id'] = $datos[0];
		$_SESSION['estado'] = "logeado";
		header('Location: ../index.php');
	}
		else {
			//echo "Login incorrecto";
			$msj='Usuario o contrasena incorrectos';
			header('Location: ../index.php?msj='.$msj.'');	
		}

?>