<?php
include("baseDatos.php");

if(isset($_POST["btn_guardar_agenda"]))
{
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    $query = "INSERT INTO agenda(titulo, descripcion) VALUES ('$titulo','$descripcion')";

    $result = mysqli_query( $conexion, $query);

    if(!$result)
        die("Error al guardar ...");
    else
    {
        $_SESSION["message"]="Registro guardado exitosamente =)";
        $_SESSION['message_type'] ="success";
        header("Location:index.php");
    }
}  
    
?>