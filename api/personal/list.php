<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  echo "invalid method";
  return;
}

$sql = "SELECT * FROM personal";
$personal = $conexion->query($sql);
$personalResult = $personal->fetchAll(PDO::FETCH_ASSOC);

header('Content-type: application/json');
echo json_encode($personalResult);
?>