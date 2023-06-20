<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "invalid method";
  return;
}

try {
  $id = $_GET['id'];

  $sql = "UPDATE orden SET fecha_inicio = NOW(), fecha_finalizacion = NULL WHERE orden_id = '$id'";

  $sentenciaSQL = $conexion->prepare($sql);
  $sentenciaSQL->execute();

  header('Content-type: application/json');
  echo json_encode(array(
    'updated' => true
  ));
} catch (Exception $ex) {
  header('Content-type: application/json');
  echo json_encode(array(
    'error' => $ex->getMessage()
  ));
}
?>