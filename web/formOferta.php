<script type="text/javascript" src="js/formReg.js"></script>
<form onsubmit="return validar(this)" id="Foferta" name="oferta" method="post" action="modulos/ofertar.php">
<fieldset><legend>Mi oferta</legend>
	<?php 
	echo'<input type="hidden" name="idSubasta" value="'.$_POST["idSubasta"].'"></input>
		';
	if(isset($_POST["idOferta"])){
		include("modulos/conexion.php");
		$sql = "SELECT * FROM `ofertas` WHERE `idOferta` = '".$_POST["idOferta"]."'";
		$resultado = mysqli_query($conexion,$sql);
		$oferta = mysqli_fetch_assoc($resultado);
		$motivo = $oferta["motivo"];
		$precio = $oferta["precio"];
		echo'<input type="hidden" name="idOferta" value="'.$_POST["idOferta"].'"></input>
		';
	}
	?>
	<br><span>Precio: $ </span><input type="number"  min="1" maxlength="11" placeholder="Precio a pagar" name="precio" required="required" onchange="checkPrecio(this)" id="Precio" <?php if(isset($_POST["idOferta"])){echo 'value="'.$precio.'"';} ?> ></input><span class="oblig">*</span><div id="InfoP"></div><br><br>
	<p>¿Por que lo necesita?</p>
	<textarea autocomplete="off" required="required" id="motivo" name="motivo" rows="4" placeholder="Descripci&oacute;n del por que usted necesita el bien subastado"><?php if(isset($_POST["idOferta"])){echo utf8_encode($motivo);} ?></textarea><span class="oblig">*</span><div id="InfoM"></div><br><br>
	<input class="buttom" id="submit" type="submit" <?php if(isset($_POST["idOferta"])){echo 'value="Actualizar oferta"';}else{echo 'value="Ofertar"';}?>>
</fieldset>
</form>