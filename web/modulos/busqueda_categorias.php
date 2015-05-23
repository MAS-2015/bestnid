<?php 
include_once("conexion.php");


$sql = "SELECT * FROM `categorias` ORDER BY `categorias`.`nombre`";
$resultado= mysqli_query($conexion, $sql);

while($fila = mysqli_fetch_assoc($resultado)){
	$idCategoria = $fila["idCategoria"];
	$nombre = $fila["nombre"];
	echo '
	<a class="link-categoria" href="index.php?categoria='.$nombre.'">'.$nombre.'</a>
	';

}

mysqli_close($conexion);

?>