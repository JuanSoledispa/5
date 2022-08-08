<?php
include("baseDatos.php");

if(isset($_GET["id"]))
{
    $id = $_GET["id"]; 
    $titulo="";
    $descripcion="";  

    $query = "SELECT * FROM agenda WHERE id=$id";
    $result = mysqli_query($conexion,$query);
    $row = mysqli_fetch_assoc($result);
    $titulo = $row["titulo"];
    $descripcion = $row["descripcion"];
}

if(isset($_POST["update"]))
{
    $id = $_GET["id"]; 
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $query = "UPDATE agenda SET titulo='$titulo' , descripcion='$descripcion' WHERE id=$id";
    echo $query;
    $result = mysqli_query($conexion,$query);

    if(!$result)
        die("Error al actualizar ...");
    else
    {
        $_SESSION["message"]="Registro actualizado exitosamente =)";
        $_SESSION['message_type'] ="warning";
        header("Location:index.php");
    }
}
?>
<?php include('include/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_agenda.php?id=<?php echo $id?>" method="POST">
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="Update titulo">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('include/footer.php'); ?>

?>