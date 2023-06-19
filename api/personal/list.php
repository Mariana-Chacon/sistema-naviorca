<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  echo "invalid method";
  return;
}

try {
  $sql = "SELECT * FROM personal";
  $personal = $conexion->query($sql);
  $personalResult = $personal->fetchAll(PDO::FETCH_ASSOC);

  header('Content-type: application/json');
  echo json_encode($personalResult);
} catch (Exception $ex) {
  header('Content-type: application/json');
  echo json_encode(array(
    'error' => $ex->getMessage()
  ));
}
?>