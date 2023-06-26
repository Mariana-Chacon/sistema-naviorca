<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>    
<br>
<h2>MANTENIMIENTO PREVENTIVO</h2>
<br><br><br>
<div class="row">
			<div class="col-sm-6 text-left">
        <a href="reporte_mantenimiento.php" target="_blank"><button class="btn btn-primary mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/pdf-2--v1.png" alt="pdf-2--v1"/>Exportar PDF</button></a>	
			</div>
			<div class="col-sm-6 text-right">
      <a href="agregar_mantenimiento.php"><button class="btn btn-warning mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/add--v1.png" alt="add--v1"/>Agregar mantenimiento preventivo</button></a>	
			</div>
		</div>	
    <br>
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>Equipo</th>
      <th>Fecha de inicio</th>
      <th>Proximo mantenimiento</th>
      <th>Actividad por hacer</th>
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

    function mostrarProximoMantenimiento($fecha_finalizacion, $dias) {
      if($fecha_finalizacion == NULL)
        return '';

      $fecha_hoy = new DateTime();
      $fecha_final = new DateTime($fecha_finalizacion);

      $fecha_final->modify('+' . ($dias != NULL ? $dias : 0) . ' days');

      $fecha_diff = $fecha_hoy->diff($fecha_final);
      $fecha_diff_number = intval($fecha_diff->format('%R%a'));

      return $dias == NULL ? '' : ($fecha_diff_number <= 0 ? 'justo ahora' : 'en ' . $fecha_diff_number . ' dias'); 
    }
    
    $sql = "SELECT orden.*, personal.nombre, equipos.modelo, tipo_equipo.nombre AS nombre_equipo from orden
            LEFT JOIN personal ON orden.personal_id = personal.personal_id
            INNER JOIN equipos ON orden.equipo_id = equipos.equipo_id
            INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id
            WHERE orden.tipo_mantenimiento_id = 1
            ORDER BY orden.fecha_emision DESC";
    $ordenes = $conexion->query($sql);

    $ordenesResult = $ordenes->fetchAll(PDO::FETCH_ASSOC);

    echo mostrarProximoMantenimiento('2023-06-19', NULL);
    foreach ($ordenesResult as $ordenesData) {
    ?>
      <tr>
        <td><?php echo $ordenesData['orden_id']; ?></td>
        <td><?php echo $ordenesData['nombre_equipo'] . " - " . $ordenesData["modelo"]; ?></td>
        <td><?php echo $ordenesData['fecha_emision']; ?></td>
        <td><?php echo mostrarProximoMantenimiento($ordenesData['fecha_finalizacion'], $ordenesData['intervalo_dias']); ?></td>
        <td><?php echo $ordenesData['descripcion_asignacion']; ?></td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary edit-orden-modal" data-toggle="modal" data-id=<?= $ordenesData['orden_id'] ?> data-target="#exampleModal">Editar</button>
          <br><br>
          <?php if (mostrarIniciar($ordenesData['fecha_inicio'])) { ?><button type="button" class="btn btn-link iniciar" data-id=<?= $ordenesData['orden_id'] ?> href="#"><img width="30" height="30" src="https://img.icons8.com/color/30/edit-property.png" alt="edit-property"/></button> <?php } ?>
          <?php if (mostrarFinalizar($ordenesData['fecha_inicio'], $ordenesData['fecha_finalizacion'])) { ?><button type="button" class="btn btn-link finalizar-orden-modal" data-toggle="modal" data-id=<?= $ordenesData['orden_id'] ?> data-target="#finalizarModal" href="#"><img width="30" height="30" src="https://img.icons8.com/color/30/checkmark--v1.png" alt="checkmark--v1"/></button> <?php } ?>
          <br><br>
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
<!-----Modal finalizar------>
<div class="modal fade" id="finalizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      Finalizar mantenimiento:
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <div class="card-formulario">
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
<script type="module" src="./assets/js/mantenimiento/handleEditData.js?v=<?php echo rand(); ?>"></script>