<?php 
include("conexion.php");


$sql = "SELECT * FROM `categorias` ORDER BY `categorias`.`nombre`";
$resultado= mysqli_query($conexion, $sql);

while($fila = mysqli_fetch_assoc($resultado)){
	$idCategoria = $fila["idCategoria"];
	$nombre = $fila["nombre"];
	echo '
	<option value="'.$idCategoria.'">'.utf8_encode($nombre).'</option>
	';

}

mysqli_close($conexion);

?>
