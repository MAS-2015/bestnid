<?php
	session_start();
	include("conexion.php");
	$titulo= utf8_decode(addslashes($_POST["titulo"]));
	$categoria= addslashes($_POST["categoria"]);
	$tiempo= addslashes($_POST["tiempo"]);
	$descripcion= utf8_decode(addslashes($_POST["descripcion"]));
	$fototemp= $_FILES["imagen"]["tmp_name"];
	$foto= $_FILES["imagen"]["name"];
	chdir('../imagenes/subastas/');
	$targetdir='imagenes/subastas/';
	$dia= 86400;
	$fechaInicio= date ("Y-m-d", time());
	$fechaFin= date ("Y-m-d", time() + ($tiempo * $dia));
	$error=false;
	$msg='';
	
	$check = getimagesize($fototemp);
	if($check == false) { $error=false; $msg= $msg . $foto . "No es una im&aacute;gen v&aacute;lida. ";}
	
	if(strlen($titulo)>200){$error=true;$msg=$msg.'El titulo debe ser menor a 200 caracteres. ';}
	if(($tiempo<15) || ($tiempo>30)){$error=true; $msg=$msg.'El tiempo de subasta debe ser entre 15 y 30 d&iacute;as. ';}
	if(!isset($_SESSION['Usuario'])){$error=true;$msg=$msg.'Usted debe loguearse. ';}
	else{
		$sql="SELECT * FROM usuarios WHERE email='".$_SESSION['Usuario']."'";	
		$resultado=mysqli_query($conexion,$sql);
		if(!$resultado){$error=true;$msg=$msg.'Su usuario no pudo ser verificado. ';}
		else{
			if(!$error){
				$fila= mysqli_fetch_assoc($resultado);
				$idUsuario= $fila["idUsuario"];
				$sql = "INSERT INTO subastas (idSubasta, fechaInicio, fechaFin, titulo, descripcion, imagen, idUsuario, idCategoria) VALUES  (NULL,'".$fechaInicio."' ,'".$fechaFin."' ,'".$titulo."','".$descripcion."','NO', '".$idUsuario."', '".$categoria."')";
				$resultado= mysqli_query($conexion, $sql);
				if(!$resultado){$error=true;$msg=$msg.'No se pudo guardar la subasta en la base de datos. ';}
				else{
					$extension=substr($foto,strlen($foto)-4);
					$lastID = mysqli_insert_id($conexion);

					if (move_uploaded_file($fototemp, $lastID.$extension)){
						$sql ="UPDATE subastas SET imagen = '".$targetdir.$lastID.$extension."' WHERE idSubasta='".$lastID."'";
					}else{
						$sql="DELETE FROM subastas WHERE idSubasta = ".$lastID;
						$error=true;
						$msg=$msg.'Error al subir la imagen';
					}
					$resultado = mysqli_query($conexion,$sql);
					if(!$resultado){$error=true;'Error al actualizar en la base de datos. ';}
				}
			}
		}
	}
	mysqli_close($conexion);
	if($error){
		$salida ='Error al subastar. '.$msg;
		header ("Location: ../subastar.php?msg=".$salida);
	}
	else{
		header ("Location: ../detalles.php?id=".$lastID);
	}

?>