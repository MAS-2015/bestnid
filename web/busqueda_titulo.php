<form name="busqueda_titulo" method="get" action="">
	T&iacute;tulo: <input type="text" name="titulo" value="<?php echo (isset($_GET["titulo"])?$_GET["titulo"]:"");?>">
	<input class="buttom" type="submit" value="Buscar">
</form>