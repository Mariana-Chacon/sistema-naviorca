<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  echo "invalid method";
  return;
}

try {
  $id = $_GET['id'];

  $body = json_decode(file_get_contents('php://input'));

  $marca = $body->marca;
  $modelo = $body->modelo;
  $serial = $body->serial;

  $sql = "UPDATE equipos SET marca = '$marca', modelo = '$modelo', serial = $serial WHERE equipo_id = '$id'";

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