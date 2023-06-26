<!-----PHP----->
<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>

<br>
<h2>ORDENES GUARDADAS</h2>

<div class="row">
  <div class="col-sm-6 text-left">
    <a href="fpdf/reporte_ordenes.php" target="_blank"><button class="btn btn-primary mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/pdf-2--v1.png" alt="pdf-2--v1" />Exportar PDF</button></a>
  </div>
  <div class="col-sm-6 text-right">
    <a href="formato_orden.php"><button class="btn btn-warning mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/add--v1.png" alt="add--v1" />Nueva orden de trabajo</button></a>
  </div>
</div>
<br>
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
    function mostrarIniciar($fecha)
    {
      return $fecha == NULL;
    }

    function mostrarFinalizar($fecha_inicio, $fecha_finalizacion)
    {
      if ($fecha_inicio == NULL)
        return false;

      $fecha_inicio_date = new DateTime($fecha_inicio);
      $fecha_actual = new DateTime();

      return $fecha_actual >= $fecha_inicio_date && $fecha_finalizacion == NULL;
    }

    $sql = "SELECT orden.*, personal.nombre, equipos.modelo, tipo_equipo.nombre AS nombre_equipo from orden
            LEFT JOIN personal ON orden.personal_id = personal.personal_id
            INNER JOIN equipos ON orden.equipo_id = equipos.equipo_id
            INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id
            ORDER BY orden.fecha_emision DESC";
    $ordenes = $conexion->query($sql);

    $ordenesResult = $ordenes->fetchAll(PDO::FETCH_ASSOC);

    foreach ($ordenesResult as $ordenesData) {
      if(intval($ordenesData['tipo_mantenimiento_id']) == 2 && $ordenesData['fecha_finalizacion'] != NULL) {
        continue;
      }
    ?>
      <tr>
        <td><?php echo $ordenesData['orden_id']; ?></td>
        <td><?php echo $ordenesData['nombre'] ? $ordenesData['nombre'] : 'Sin asignar'; ?></td>
        <td><?php echo $ordenesData['nombre_equipo'] . " - " . $ordenesData["modelo"]; ?></td>
        <td><?php echo $ordenesData['fecha_emision']; ?></td>
        <td><?php echo $ordenesData['fecha_inicio']; ?></td>
        <td><?php echo $ordenesData['descripcion_asignacion']; ?></td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary edit-orden-modal" data-toggle="modal" data-id=<?= $ordenesData['orden_id'] ?> data-target="#exampleModal">Editar</button>
          <br><br>
          <?php if (mostrarIniciar($ordenesData['fecha_inicio'])) { ?><button type="button" class="btn btn-link iniciar" data-id=<?= $ordenesData['orden_id'] ?> href="#"><img width="30" height="30" src="https://img.icons8.com/color/30/edit-property.png" alt="edit-property"/></button> <?php } ?>
          <?php if (mostrarFinalizar($ordenesData['fecha_inicio'], $ordenesData['fecha_finalizacion'])) { ?><button type="button" class="btn btn-link finalizar-orden-modal" data-toggle="modal" data-id=<?= $ordenesData['orden_id'] ?> data-target="#finalizarModal" href="#"><img width="30" height="30" src="https://img.icons8.com/color/30/checkmark--v1.png" alt="checkmark--v1"/></button> <?php } ?>
          <br><br>
          <button type="button" class="btn btn-danger delete-orden-modal" data-toggle="modal" data-id=<?= $ordenesData['orden_id'] ?> data-target="#staticBackdrop"><img width="30" height="30" src="https://img.icons8.com/color/30/delete.png" alt="delete" /></button>
          <!-- Button  modal -->

        </td>
      <?php
    }
      ?>
  </tbody>
</table>
<!-- Modal Editar-->
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
                <div class="form-group">
                  <label for=<?= 'personal-' . $ordenesData['orden_id'] ?>>Personal responsable</label>
                  <select class="form-control" name="personal" id="personal">
                    <option value="NULL">Selecciona una opcion</option>
                  </select>
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
        <button id="update" type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

<!---Modal Eliminar---->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Eliminar orden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar esta orden?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Atrás</button>
        <button id="delete" type="button" class="btn btn-primary">Si</button>
      </div>
    </div>
  </div>
</div>

<!-----Modal finalizar------>
<div class="modal fade" id="finalizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="descripcion">Descripcion del informe</label>
          </br></br>
          <textarea class="form-control" name="descripcion-informe" id="descripcion-informe" rows="6"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="finalizar" type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.date').datepicker();
  });
</script>
<script type="text/javascript" src="path/to/jquery.min.js"></script>
<script type="text/javascript" src="path/to/bootstrap.min.js"></script>
 
<script type="module" src="./assets/js/orden/handleEditData.js?v=<?php echo rand(); ?>"></script>