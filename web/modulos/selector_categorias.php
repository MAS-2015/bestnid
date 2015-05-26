<?php
//crea un selector
	include("conexion.php");
	$sql="SELECT idCategoria, nombre FROM categorias";
	$resultado = mysqli_query($conexion, $sql);
	echo '<select name="selector">';
	while($categoria= mysqli_fetch_row($resultado)){
		echo"<option value='$categoria[0]'> $categoria[1] </option>";
	}
	echo'</select>';
	mysqli_close($conexion);

?>