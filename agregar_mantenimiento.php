<!-----PHP----->
<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>
<!--- CODIGO QUE DESENCADENAS LAS ACCIONES DEL FORMULARIO QUE PERMITIRAN GUARDAR INFORMACION EN LA BASE DE DATOS--->

<?php
try {
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql1 = "SELECT equipos.*, tipo_equipo.nombre from equipos
              INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id";
    $sql2 = "SELECT * from personal";
    $sql3 = "SELECT * from tipo_mantenimiento";

    $equipos = $conexion->query($sql1);
    $personal = $conexion->query($sql2);
    $tipoMantenimiento = $conexion->query($sql3);

    $equiposResult = $equipos->fetchAll(PDO::FETCH_ASSOC);
    $personalResult = $personal->fetchAll(PDO::FETCH_ASSOC);
    $tipoMantenimientoResult = $tipoMantenimiento->fetchAll(PDO::FETCH_ASSOC);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_mantenimiento_id = (isset($_POST['selectMantenimiento'])) ? $_POST['selectMantenimiento'] : "";
    $personal_id = (isset($_POST['txtPersonal'])) ? $_POST['txtPersonal'] : "";
    $equipo_id = (isset($_POST['txtEquipo'])) ? $_POST['txtEquipo'] : "";
    $fecha_inicio = (isset($_POST['dateDos'])) ? $_POST['dateDos'] : "";
    $descripcion_asignacion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    $sentenciaSQL = $conexion->prepare("INSERT INTO orden(tipo_mantenimiento_id, personal_id, equipo_id, descripcion_asignacion, fecha_emision, fecha_inicio) VALUES ('$tipo_mantenimiento_id', '$personal_id', '$equipo_id', '$descripcion_asignacion', NOW(), '$fecha_inicio');");
    $sentenciaSQL->execute();

    header("Location: ordenes.php");
    exit;
  }
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>
<br>
<form method="post" enctype="multipart/form-data" class="text-center">
  <div class="col-md-5 mx-auto">
    <div class="card-formulario" style="height: 600px;";>
      <div class="card-header">
        CREAR UNA NUEVA ORDEN DE TRABAJO
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="selectMantenimiento">Tipo de mantenimiento</label>
            <select class="form-control" name="selectMantenimiento" id="selectMantenimiento">
            <option>Selecciona una opcion</option>
              <?php
              foreach ($tipoMantenimientoResult as $tipoMantenimientoData) {
              ?>
                <option value=<?php echo $tipoMantenimientoData["id"] ?>><?php echo $tipoMantenimientoData["nombre"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="txtPersonal">Personal responsable</label>
            <select class="form-control" name="txtPersonal" id="txtPersonal">
              <option>Selecciona una opcion</option>
              <?php
              foreach ($personalResult as $personalData) {
              ?>
                <option value=<?php echo $personalData["personal_id"] ?>><?php echo $personalData["nombre"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="textEquipo">Equipo</label>
          <select class="form-control" name="txtEquipo" id="txtEquipo">
            <option>Selecciona una opcion</option>
            <?php
            foreach ($equiposResult as $equiposData) {
            ?>
              <option value=<?php echo $equiposData["equipo_id"] ?>><?php echo $equiposData["nombre"] . " - " . $equiposData["modelo"] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="dateDos">Fecha de inicio</label>
            <input class="date form-control" name="dateDos" id="dateDos" type="date" />
          </div>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripcion de la asignacion</label>
          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
        </div>
        <div class="btn-group" role="group" aria-label="">
          <button type="submit" class="btn btn-success">Agregar</button>
          <a href="ordenes.php"><button type="button" class="btn btn-info">Volver</button></a>
        </div>
      </div>
    </div>
</form>