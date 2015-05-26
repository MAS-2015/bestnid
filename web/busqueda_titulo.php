<form class="buscador" name="busqueda_titulo" method="get" action="">
	<input type="text" value="Busque por t&iacute;tulo de subasta" onfocus="if(this.value == 'Busque por t&iacute;tulo de subasta') { this.value = ''; }" onblur="if (this.value == '') {this.value = 'Busque por t&iacute;tulo de subasta';}"name="titulo" value="<?php echo (isset($_GET["titulo"])?$_GET["titulo"]:"");?>">
	<input class="buttom" type="submit" value="Buscar">
</form>
