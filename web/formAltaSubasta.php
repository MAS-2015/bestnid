
<div class="registro">
	<?php
	
	if(!isset($_SESSION["Usuario"])){
		echo '<p class="infoR">PARA SUBASTAR DEBE ESTAR LOGUEADO COMO USUARIO</p>';
	}
	else{
		echo'
		<p class="infoR">COMPLETE LOS DATOS INDICADOS PARA SUBASTAR UN PRODUCTO</p>
		
		<form required="required" id="formSubasta" onsubmit="return valido(this)" target="_self" name="altaSubasta" class="reg" method="post" action="modulos/altaSubasta.php" enctype="multipart/form-data">
			<input required="required" id="titulo" type="text" name="titulo" placeholder="T&iacute;tulo subasta"><img src="imagenes/ayuda.png"  Title="* Ingrese el t&iacute;tulo que desea para su subasta" ><span class="oblig">*</span> <div id="Info3"></div><br><br>
			<select required="required" name="categoria">
				<option selected disabled>Seleccione una categor&iacute;a </option>
		';
			
			include('modulos/option_categorias.php');
		
		echo '
			</select><img src="imagenes/ayuda.png"  Title="* Seleccione una categor&iacute;a para la subasta" ><span class="oblig">*</span> <div id="Info5"></div><br><br>
			<span>Tiempo de subasta: </span>
				<select required="required" name="tiempo">
				';
				for($i=15; $i <= 30; $i++){
					echo '<option value="'.$i.'">'.$i.' d&iacute;as</option>
					';
				}
		echo '
				</select><br><br>
			<input required="required" type="file" id="imagen" name="imagen" accept="image/*"><img src="imagenes/ayuda.png"  Title="* Ingrese una imagen"><span class="oblig">*</span><div id="Info"></div><br><br>
			<textarea autocomplete="off" required="required" id="descripcion" name="descripcion" rows="4" placeholder="Descripci&oacute;n de la subasta"></textarea><img src="imagenes/ayuda.png"  Title="* Escriba una breve descripci&oacute;n del producto a subastar" ><span class="oblig">*</span><div id="Info4"></div><br><br>
		<input type="reset" id="reset" value="Limpiar formulario" class="buttom">
		<input type="submit" id="enviar" value="Subastar" class="buttom">
		</form>
		';
	}
	if(isset($_GET["msg"]) ){
		echo '<div id="error">'.$_GET["msg"].'</script>';
	}
	
	?>
</div>