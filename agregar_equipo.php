<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>
<?php
try {
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql1 = "SELECT * from tipo_equipo";
    $tipo_equipo = $conexion->query($sql1);
    $tipoEquipoResult = $tipo_equipo->fetchAll(PDO::FETCH_ASSOC);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipo_id = (isset($_POST['equipo_id'])) ? $_POST['equipo_id'] : "";
    $tipo_equipo_id = (isset($_POST['selectTipoEquipo'])) ? $_POST['selectTipoEquipo'] : "";
    $marca = (isset($_POST['marca'])) ? $_POST['marca'] : "";
    $modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : "";
    $serial = (isset($_POST['serial'])) ? $_POST['serial'] : "";

    $sentenciaSQL = $conexion->prepare("INSERT INTO equipos(equipo_id, tipo_equipo_id, marca, modelo, serial) VALUES ($equipo_id, $tipo_equipo_id, '$marca', '$modelo', '$serial')");
    $sentenciaSQL->execute();

    header("Location: embarcaciones.php");
    exit;
  }
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>

<form method="post" enctype="multipart/form-data" class="text-center">
  <div class="col-md-5 mx-auto">
    <div class="card-formulario">
      <div class="card-header">
        AÑADIR UN NUEVO EQUIPO
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-group">
              <label>ID equipo:</label>
              <input type="text" class="form-control" name="equipo_id" id="equipo_id" placeholder="identificador equipo">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="selectMantenimiento">Tipo de equipo</label>
            <select class="form-control" name="selectTipoEquipo" id="selectTipoEquipo">
              <option>Selecciona una opcion</option>
              <?php
              foreach ($tipoEquipoResult as $tipoEquipoData) {
              ?>
                <option value=<?php echo $tipoEquipoData["id"] ?>><?php echo $tipoEquipoData["nombre"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Marca</label>
              <input type="text" class="form-control" name="marca" id="marca">
            </div>
            <div class="form-group col-md-4">
              <label>Modelo</label>
              <input id="modelo" name="modelo" type="text" class="form-control" placeholder="modelo">
            </div>
            <div class="form-group col-md-2">
              <label>Serial</label>
              <input type="text" class="form-control" id="serial" name="serial">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="file" class="form-control-file" id="archivo" style="color:white;">
      </div>
    </div>
  </div>
  <div class="btn-group" role="group" aria-label="">
    <button type="submit" class="btn btn-success">Agregar</button>
    <a href="embarcaciones.php"><button type="button" class="btn btn-info">Volver</button></a>
  </div>
</form>