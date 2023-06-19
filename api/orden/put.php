<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  echo "invalid method";
  return;
}

try {
  $id = $_GET['id'];

  $body = json_decode(file_get_contents('php://input'));

  $descripcion_asignacion = $body->descripcion_asignacion;
  $personal_id = $body->personal_id;

  $sql = "UPDATE orden SET descripcion_asignacion = '$descripcion_asignacion', personal_id = $personal_id WHERE orden_id = '$id'";

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