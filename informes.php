<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>

<br>
<h2>INFORMES</h2>
<br><br><br><br>
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>Orden id</th>
      <th>Equipo</th>
      <th>Nombre del responsable</th>
      <th>Fecha de finalizacion</th>
      <th>Informacion</th>
      <th>Descripcion de la asignacion</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM informes";
    $informes = $conexion->query($sql);

    $informesResult = $informes->fetchAll(PDO::FETCH_ASSOC);

    foreach ($informesResult as $informesData) {
    ?>
      <tr>
        <td><?php echo $informesData['informe_id']; ?></td>
        <td><?php echo $informesData['orden_id']; ?></td>
        <td><?php echo $informesData['tipo_equipo'] . " - " . $informesData["marca_equipo"] . " - " . $informesData["modelo_equipo"] . " - " . $informesData["serial_equipo"]; ?></td>
        <td><?php echo $informesData['nombre_personal'] ? $informesData['nombre_personal'] : 'Sin asignar'; ?></td>
        <td><?php echo $informesData['fecha_finalizacion']; ?></td>
        <td><?php echo $informesData['informacion_informe']; ?></td>
        <td><?php echo $informesData['descripcion_asignacion']; ?></td>
        <td>
          <a href="informe_final.php" target="_blank"><button class="btn btn-primary mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/pdf-2--v1.png" alt="pdf-2--v1" />Exportar PDF</button></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>