<?php
	session_start();
	include("conexion.php");
	include('funciones_detalle.php');
	chdir('../');
	if( is_numeric($_POST["idSubasta"]) ){
		$idSubasta = $_POST["idSubasta"];
		$idUsuario = buscarIdUsuarioPorEmail($_SESSION["Usuario"]);
		$titulo= utf8_decode(addslashes($_POST["titulo"]));
		$categoria= addslashes($_POST["categoria"]);
		$descripcion= utf8_decode(addslashes($_POST["descripcion"]));
		
		echo getcwd();
		if(subastaEditable($idSubasta) && dueñoSubasta($idUsuario,$idSubasta)){		
			$agregarFoto="";
			if(isset($_FILES["imagen"]["tmp_name"]) && $_FILES["imagen"]["tmp_name"] != ""){
				$fototemp= $_FILES["imagen"]["tmp_name"];
				$foto= $_FILES["imagen"]["name"];
				$extension=substr($foto,strlen($foto)-4);
				$imagenes="imagenes/subastas/";
				chdir('imagenes/subastas/');
				unlink($idSubasta.$extension);
				if(move_uploaded_file($fototemp, $idSubasta.$extension)){
					$agregarFoto=", imagen='".$imagenes.$idSubasta.$extension." '";
				}
			}
			$sql= "UPDATE `subastas` SET titulo='".$titulo."', descripcion='".$descripcion."', idCategoria='".$categoria."' ".$agregarFoto." WHERE idUsuario='".$idUsuario."' AND  idSubasta='".$idSubasta."'";
			$resultado= mysqli_query($conexion, $sql);
			mysqli_close($conexion);
			if($resultado){
				header('Location: ../detalles.php?id='.$idSubasta);
			}
			else{
				header('Location: ../index.php?msj=Error al modificar');
			}
		}
	}
	else{ echo 'Error al modificar';}
?>