<form class="buscador" name="busqueda_titulo" method="get" action="">
	<input type="text" placeholder="Busque por t&iacute;tulo de subasta" name="titulo" value="<?php echo (isset($_GET["titulo"])?$_GET["titulo"]:"");?>">
	<input class="buttom" type="submit" value="Buscar">
</form>
