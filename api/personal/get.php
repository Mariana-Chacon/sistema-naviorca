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
  $sql = "SELECT * FROM personal WHERE personal_id = '$id'";

  $sentenciaSQL = $conexion->prepare($sql);
  $sentenciaSQL->execute();

  $personalResult = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

  header('Content-type: application/json');
  echo json_encode($personalResult ? $personalResult : array(
    'error' => 'No existe esta persona'
  ));
} catch (Exception $ex) {
  header('Content-type: application/json');
  echo json_encode(array(
    'error' => $ex->getMessage()
  ));
}
?>