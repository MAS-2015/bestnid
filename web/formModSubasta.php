<div class="registro">

	<?php
	
	if(!isset($_SESSION["Usuario"])){
		echo '<p class="infoR">PARA EDITAR LA SUBASTA DEBE ESTAR LOGUEADO COMO USUARIO</p>';
	}
	else{
		if(isset($_POST["idSubasta"]) && is_numeric($_POST["idSubasta"])){	
			include("modulos/conexion.php");
			$idSubasta=$_POST["idSubasta"];
			echo'
			<script>
				function atras(){
					var id = '.$idSubasta.';
					$.post("subastar.php",
					{
						idSubasta: id,
						modificar: "si"
					},
					function(data, status){
						document.body.innerHTML = data;
					});
				}
			</script>
			';
			$sql = "SELECT * FROM `subastas` WHERE `idSubasta`='".$idSubasta."'";
			$resultado= mysqli_query($conexion, $sql);
			$subasta = mysqli_fetch_assoc($resultado);
			echo'
			<p class="infoR">CAMBIE LOS DATOS QUE QUIERA DE LA SUBASTA</p>
			
			<form required="required" id="formSubasta" onsubmit="return valido(this)" name="modSubasta" class="reg" method="POST" action="modulos/modSubasta.php" enctype="multipart/form-data">
				<input required="required" id="titulo" type="text" name="titulo" placeholder="T&iacute;tulo subasta" value="'.utf8_encode($subasta["titulo"]).'" ><img src="imagenes/ayuda.png"  Title="* Ingrese el t&iacute;tulo que desea para su subasta" ><span class="oblig">*</span> <div id="Info3"></div><br><br>
				<input type="hidden" name="idSubasta" value="'.$idSubasta.'"></input>
				<select required="required" name="categoria">
					<option disabled>Seleccione una categor&iacute;a </option>
			';
			$sql = "SELECT * FROM `categorias` ORDER BY `categorias`.`nombre`";
			$resultado= mysqli_query($conexion, $sql);

			while($fila = mysqli_fetch_assoc($resultado)){
				$idCategoria = $fila["idCategoria"];
				$nombre = $fila["nombre"];
				echo '
				<option value="'.$idCategoria.'" '.($idCategoria == $subasta["idCategoria"] ? "selected":"").'>'.utf8_encode($nombre).'</option>
				';

			}
			
			echo '
				</select><img src="imagenes/ayuda.png"  Title="* Seleccione una categor&iacute;a para la subasta" ><span class="oblig">*</span> <div id="Info5"></div><br><br>
				<p>Imagen anterior:</p><div style="background-image: url('.$subasta["imagen"].');  background-size: contain ; background-repeat:no-repeat ;min-width:150px;min-height:150px; max-width:100%; max-height:100%;"></div><br><p>(No seleccione otra im&aacute;gen si no desea cambiar la actual)</p>
				<input type="file" id="imagen" name="imagen" accept="image/*"><img src="imagenes/ayuda.png"  Title="* Ingrese una imagen"><span class="oblig">*</span><div id="Info"></div><br><br>
				<textarea autocomplete="off" required="required" id="descripcion" name="descripcion" rows="4" placeholder="Descripci&oacute;n de la subasta">'.utf8_encode($subasta["descripcion"]).'</textarea><img src="imagenes/ayuda.png"  Title="* Escriba una breve descripci&oacute;n del producto a subastar" ><span class="oblig">*</span><div id="Info4"></div><br><br>
			<input type="reset" id="anterior" value="Resetear a lo anterior" class="buttom" onclick="atras();">
			<input type="submit" id="enviar" name="modificar" value="modificar" class="buttom">
			</form>
			';
		}
		if(isset($_GET["msg"]) ){
			echo '<div id="error">'.$_GET["msg"].'</div>';
		}
	}
	?>
</div>