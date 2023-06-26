<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reporte equipos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>"></link>
</head>
<?php
include "./config/conexion.php";
?>
<img src="assets/imagenes/NAVIORCA_NUEVO_HORIZONTAL.png" alt="" style="width: 300px;">

<div class="container">
  <h2>EQUIPOS <br> <small>(motogeneradores y maquina principal)</small></h2>
  <br> 
</div>
<table>
  <thead>
    <tr>
      <th> Id</th>
      <th> Tipo de equipo</th>
      <th> Marca</th>
      <th> Modelo</th>
      <th> Serial</th>
     </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * from equipos";
    $equipos = $conexion->query($sql);

    $equiposResult = $equipos->fetchAll(PDO::FETCH_ASSOC);

    foreach ($equiposResult as $equiposData) 
    ?>
   
      <tr>
        <td><?php echo $equiposData['equipo_id']; ?></td>
        <td><?php echo $equiposData['tipo_equipo_id']; ?></td>
        <td><?php echo $equiposData['marca']; ?></td>
        <td><?php echo $equiposData['modelo']; ?></td>
        <td><?php echo $equiposData['serial']; ?></td>
      </tr>
  </tbody>
  </table>

  <?php
  include_once "./vendor/autoload.php";
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  ob_start();
  include "./tabla.php";
  $html = ob_get_clean();
  $dompdf->loadHtml($html);
  $dompdf->render();
  header("Content-type: application/pdf");
  header("Content-Disposition: inline; filename=documento.pdf");
  echo $dompdf->output();
?>