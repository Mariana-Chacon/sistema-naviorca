<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>

<?php
try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (isset($_POST['id'])) ? $_POST['id'] : "";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : "";

    $sentenciaSQL = $conexion->prepare("INSERT INTO personal(personal_id, nombre, cargo, disponible) VALUES ('$id', '$nombre', '$cargo', 'disponible');");
    $sentenciaSQL->execute();

    header("Location: personal.php");
    exit;
  }
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>

<form method="post" enctype="multipart/form-data" class="text-center">
  <div class="col-md-5 mx-auto">
    <div class="card-formulario" style="height: 300px;">
      <div class="card-header">
       AGREGAR UN NUEVO PERSONAL
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group  ">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="id" id="id" placeholder="ID....">
            </div>
          </div>
         
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            
            <div class="form-group col-md-6">
            <label for="selectMantenimiento">Cargo</label>
            <select class="form-control" name="cargo" id="cargo">
              <option>Selecciona una opcion</option>
              <option value="mecanico">Mecanico</option>
              <option value="soldador">Soldador</option>
              <option value="maquinista">Maquinista</option>
            </select>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="btn-group" role="group" aria-label="">
    <button type="submit" class="btn btn-success">Agregar</button>
    <a href="personal.php"><button type="button" class="btn btn-info">Volver</button></a>
  </div>
</form>