<?php
sleep(1);
include('conexion.php');
if($_REQUEST) {
    $email = $_REQUEST['email'];
    $query = "select * from usuarios where email = '".($email)."'";
    $results = mysqli_query($conexion,$query) or die('ok');

    if(mysqli_num_rows($results) > 0)
        echo '<div id="Error"></div>';
    else
        echo '<div id="Success"></div>';
}
?>