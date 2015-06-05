<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bestnid";


$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    die("Coxion fallida: " . mysqli_connect_error());
}


?> 