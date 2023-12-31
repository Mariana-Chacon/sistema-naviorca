<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
  echo "invalid method";
  return;
}

$id = $_GET['id'];

if(!$id) {
  echo "no id was entered";
  return;
}

try {
  $sql = "DELETE FROM personal WHERE personal_id = '$id'";

  $sentenciaSQL = $conexion->prepare($sql);
  $sentenciaSQL->execute();

  header('Content-type: application/json');
  echo json_encode(array(
    'deleted' => true
  ));
} catch (Exception $ex) {
  header('Content-type: application/json');
  echo json_encode(array(
    'error' => $ex->getMessage()
  ));
}
?>