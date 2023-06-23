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
      <th>Marca</th>
      <th>Modelo</th>
      <th>Serial</th>
      <th>Nombre del responsable</th>
      <th>Fecha de finalizacion</th>
      <th>Informacion</th>
      <th>Descripcion de la asignacion</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT informenes.*, informe_id, informacion_informe, personal.nombre AS nombre_personal, fecha_inicio, fecha_finalizacion, tipo_equipo.nombre AS tipo_equipo, marca_equipo, modelo_equipo, serial_equipo, descripcion_asignacion, orden_id
  FROM informenes
  INNER JOIN equipos ON informenes.equipo_id = equipos.equipo_id
  INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id";
$informes = $conexion->query($sql);

$informesResult = $informes->fetchAll(PDO::FETCH_ASSOC);

foreach ($informesResult as $informesData); 
?>
<tr>
<td><?php echo $informesData['informe_id']; ?></td>
<td><?php echo $informesData['informacion_informe']; ?></td>
<td><?php echo $informesData['nombre_personal'] ? $informesData['nombre_personal'] : 'Sin asignar'; ?></td>
<td><?php echo $informesData['fecha_inicio']; ?></td>
<td><?php echo $informesData['fecha_finalizacion']; ?></td>
<td><?php echo $informesData['tipo_equipo'] . " - " . $informesData["marca_equipo"] . " - " . $informesData["modelo_equipo"] . " - " . $informesData["serial_equipo"]; ?></td>
<td><?php echo $informesData['descripcion_asignacion']; ?></td>
<td><?php echo $informesData['orden_id']; ?></td>
<td>
<?php
// Incluyendo la libreria dompdf
require_once 'dompdf/autoload.inc.php';

// Recuperar el contenido HTML que deseas exportar a PDF
$html = file_get_contents('informe_final.html');

// Crear una nueva instancia de DOMPDF
$dompdf = new Dompdf\Dompdf();

// Cargar el contenido HTML en DOMPDF
$dompdf->loadHtml($html);

// Configurar las opciones de DOMPDF
$dompdf->setPaper('A4', 'portrait');

// Renderizar el contenido HTML en PDF
$dompdf->render();

// Enviar el archivo PDF al navegador
$dompdf->stream('informe_final.pdf', array('Attachment' => false));
?>
 
<a href="informe_final.html" target="_blank"><button class="btn btn-primary mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/pdf-2--v1.png" alt="pdf-2--v1"/>Exportar PDF</button></a>	

</td>
  </tbody>
</table>

