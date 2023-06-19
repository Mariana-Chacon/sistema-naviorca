<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  echo "invalid method";
  return;
}

try {
  $id = $_GET['id'];

  $body = json_decode(file_get_contents('php://input'));

  $nombre = $body->nombre;
  $cargo = $body->cargo;

  $sql = "UPDATE personal SET nombre = '$nombre', cargo = '$cargo' WHERE personal_id = '$id'";

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