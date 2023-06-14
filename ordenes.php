<!-----PHP----->
<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "config/conexion.php"
?>

<br>
<h2>Ordenes guardadas</h2>
<a href="formato_orden.php"><button type="button" class="btn-warning">Nueva orden</button></a>
<table>
  <thead>
    <tr>
        <th>id</th>
        <th>Personal responsable</th>
        <th>Equipo</th>
        <th>Fecha de emision</th>
        <th>Fecha de inicio</th>
        <th>Descripcion de la asignacion</th>
        <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
            <?php
            $sql = "SELECT orden.*, personal.nombre, equipos.modelo, tipo_equipo.nombre AS nombre_equipo from orden
                           INNER JOIN personal ON orden.personal_id = personal.personal_id
                           INNER JOIN equipos ON orden.equipo_id = equipos.equipo_id
                           INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id";
            $ordenes = $conexion->query($sql);

            $ordenesResult = $ordenes->fetchAll(PDO::FETCH_ASSOC);

            foreach ($ordenesResult as $ordenesData) {
            ?>
                <tr>
                    <td><?php echo $ordenesData['orden_id']; ?></td>
                    <td><?php echo $ordenesData['nombre']; ?></td>
                    <td><?php echo $ordenesData['nombre_equipo'] . " - " . $ordenesData["modelo"]; ?></td>
                    <td><?php echo $ordenesData['fecha_emision']; ?></td>
                    <td><?php echo $ordenesData['fecha_inicio']; ?></td>
                    <td><?php echo $ordenesData['descripcion_asignacion']; ?></td>
                    <td>
                         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary edit-orden-modal" data-toggle="modal" data-id=<?=$ordenesData['orden_id']?> data-target="#exampleModal">Editar</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
    <div class="card-formulario">
      <div class="card-header">
        Editar orden de trabajo
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
          <div class="form-group col-md-5">
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
            <input class="date form-control" name="dateUno" id="dateUno" type="text" placeholder="D/M/Y" title="format: dd/MM/y" />
          </div>
          <div class="form-group col-md-6">
            <label for="dateDos">Fecha de inicio</label>
            <input class="date form-control" name="dateDos" id="dateDos" type="text" placeholder="D/M/Y" title="format: dd/MM/y" />
          </div>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripcion de la asignacion</label>
          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
        </div>
      </div>
    </div>
</form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
 <br><br>
                        
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Borrar</button>
</td>
            <?php
            }
            ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Anterior</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Siguiente</a>
    </li>
  </ul>
</nav>

<script type="text/javascript">
  $(document).ready(function() {
    $('.date').datepicker();
  });
</script>
<script type="text/javascript" src="path/to/jquery.min.js"></script>
<script type="text/javascript" src="path/to/bootstrap.min.js"></script>
<script type="text/javascript" src="path/to/datepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/ab-datepicker@latest"></script>
<script type="module" src="./assets/js/order/handleEditData.js"></script>