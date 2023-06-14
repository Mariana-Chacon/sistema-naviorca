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

$sql = "SELECT * FROM orden WHERE orden_id = :id";

$sentenciaSQL = $conexion->prepare($sql);
$sentenciaSQL->bindParam(":id", $id);
$sentenciaSQL->execute();

$ordenResult = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

header('Content-type: application/json');
echo json_encode($ordenResult ? $ordenResult : array(
  'error' => 'No existe esta orden'
));
?>