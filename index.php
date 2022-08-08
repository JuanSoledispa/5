<?php 
include("baseDatos.php");
include("include/header.php") 

?>
<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset(); } ?>
      
      <!-- ADD agenda FORM -->
      <div class="card card-body">
        <form action="guardar_agenda.php" method="POST">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="agenda titulo" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="agenda descripcion"></textarea>
          </div>
          <input type="submit" name="btn_guardar_agenda" class="btn btn-success btn-block" value="Guardar agenda">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>titulo</th>
            <th>descripcion</th>
            <th>Fecha Creacion</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT * from agenda";
            $result = mysqli_query($conexion,$query);
            while ( $row = mysqli_fetch_assoc($result))
            {
            ?>
            <tr>
                <td><?php echo $row["titulo"] ?></td>
                <td><?php echo $row["descripcion"] ?></td>
                <td><?php echo $row["fecha_creacion"] ?></td>
                <td>
                <a href="editar_agenda.php?id=<?php echo $row["id"] ?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="eliminar_agenda.php?id=<?php echo $row["id"]?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
                </td>
            </tr>
            <?php } ?>         
        </tbody>
      </table>
    </div>

  </div>
</main>
<?php include("include/footer.php") ?>

