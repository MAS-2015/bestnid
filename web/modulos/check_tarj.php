<?php
sleep(1);
include('conexion.php');
if($_REQUEST) {
    $tarj = $_REQUEST['tarj'];
    $query2 = "select * from usuarios where nroTarjeta = '".($tarj)."'";
    $results2 = mysqli_query($conexion,$query2) or die('ok');

    if(mysqli_num_rows($results2) > 0)
        echo '<div id="ErrorTarjeta"></div>';
    else
        echo '<div id="Success"></div>';
}
?>