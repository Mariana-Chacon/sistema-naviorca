<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  echo "invalid method";
  return;
}

$id = $_GET['id'];

if(!$id) {
  echo "no id was entered";
  return;
}

try {
  $sql = "SELECT * FROM equipos WHERE equipo_id = '$id'";

  $sentenciaSQL = $conexion->prepare($sql);
  $sentenciaSQL->execute();

  $equipoResult = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

  header('Content-type: application/json');
  echo json_encode($equipoResult ? $equipoResult : array(
    'error' => 'No existe este equipo'
  ));
} catch (Exception $ex) {
  header('Content-type: application/json');
  echo json_encode(array(
    'error' => $ex->getMessage()
  ));
}
?>