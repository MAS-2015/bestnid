<?php
	$user= addslashes($_POST['email']);
	$pass= addslashes($_POST['pass']);
	include('conexion.php');
	$sql="SELECT * FROM administradores WHERE email='".$user."' AND password='".$pass."'";
	$result=mysqli_query($conexion,$sql);
	if(mysqli_num_rows($result) > 0){
		session_start();
		$_SESSION['Admin'] = $user;
		$_SESSION['estado'] = "logeado";
		header('Location: ../index.php');
	}
		else {
			//echo "Login incorrecto";
			$msj='Datos incorrectos';
			header('Location: ../index.php?msj='.$msj.'');	
		}

?>