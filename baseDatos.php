<?php
session_start();
$hostame = 'localhost';
$user    = 'root';
$pwd     = '';
$database = 'agenda_64_2021ci';

$conexion = mysqli_connect($hostame, $user, $pwd, $database);

if(!$conexion)
    die("Error de conexion a la BD " . mysqli_connect_error() );
else
    echo("Conexion exitosa =) ");

?>