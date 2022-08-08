<?php
include("baseDatos.php");
    $id = $_GET["id"];   

    $query = "DELETE FROM agenda WHERE id = $id ";
    echo $query;
    $result = mysqli_query( $conexion, $query);

    if(!$result)
        die("Error al eliminar ...");
    else
    {
        $_SESSION["message"]="Registro elimanado exitosamente =)";
        $_SESSION['message_type'] ="danger";
        header("Location:index.php");
    }

    
?>