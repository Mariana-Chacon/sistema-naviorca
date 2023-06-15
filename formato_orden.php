<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ab-datepicker@latest/css/datepicker.css" type="text/css" />
<link rel="stylesheet" href="path/to/font-awesome5.min.css" type="text/css" />
<!-----PHP----->
<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>
<!--- CODIGO QUE DESENCADENAS LAS ACCIONES DEL FORMULARIO QUE PERMITIRAN GUARDAR INFORMACION EN LA BASE DE DATOS--->

<?php
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
  $selectMantenimiento = (isset($_POST['selectMantenimiento'])) ? $_POST['selectMantenimiento'] : "";
  $txtPersonal = (isset($_POST['txtPersonal'])) ? $_POST['txtPersonal'] : "";
  $txtEquipo = (isset($_POST['txtEquipo'])) ? $_POST['txtEquipo'] : "";
  $dateUno = (isset($_POST['dateUno'])) ? $_POST['dateUno'] : "";
  $dateDos = (isset($_POST['dateDos'])) ? $_POST['dateDos'] : "";
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

  $sentenciaSQL = $conexion->prepare("INSERT INTO orden(tipo_mantenimiento_id, personal_id, equipo_id, descripcion_asignacion, fecha_emision, fecha_inicio) VALUES (:tipo_mantenimiento_id, :personal_id, :equipo_id, :descripcion_asignacion, :fecha_emision, :fecha_inicio);");
  if ($sentenciaSQL === false)
    die("Error en la consulta: " . $conexion->error);
  $sentenciaSQL->bindParam(":tipo_mantenimiento_id", $selectMantenimiento);
  $sentenciaSQL->bindParam(":personal_id", $txtPersonal);
  $sentenciaSQL->bindParam(":equipo_id", $txtEquipo);
  $sentenciaSQL->bindParam(":descripcion_asignacion", $descripcion);
  $sentenciaSQL->bindParam(":fecha_emision", $dateUno);
  $sentenciaSQL->bindParam(":fecha_inicio", $dateDos);
  $sentenciaSQL->execute();

  header("Location: ordenes.php");
  exit;
}

?>
<form method="post" enctype="multipart/form-data">
  <div class="col-md-5">
    <div class="card-formulario">
      <div class="card-header">
        Crear nueva orden de trabajo
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
            <label for="dateUno">Fecha de emision</label>
            <input class="date form-control" name="dateUno" id="dateUno" type="text" placeholder="d/M/y" title="format: dd/MM/y" />
          </div>
          <div class="form-group col-md-6">
            <label for="dateDos">Fecha de inicio</label>
            <input class="date form-control" name="dateDos" id="dateDos" type="text" placeholder="d/M/y" title="format: dd/MM/y" />
          </div>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripcion de la asignacion</label>
          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
        </div>
        <div class="btn-group" role="group" aria-label="">
          <button type="submit" class="btn btn-success">Agregar</button>
          <a href="formato_orden.php"><button type="button" class="btn btn-info">Volver</button></a>
        </div>
      </div>
    </div>
</form>
<script type="text/javascript">
  $(document).ready(function() {
    $('.date').datepicker();
  });
</script>
<script type="text/javascript" src="path/to/jquery.min.js"></script>
<script type="text/javascript" src="path/to/bootstrap.min.js"></script>
<script type="text/javascript" src="path/to/datepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/ab-datepicker@latest"></script>