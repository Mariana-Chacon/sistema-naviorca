<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  echo "invalid method";
  return;
}

$id = $_GET['id'];

$body = json_decode(file_get_contents('php://input'));

$

$sql = "SELECT * FROM personal";
$personal = $conexion->query($sql);
$personalResult = $personal->fetchAll(PDO::FETCH_ASSOC);

header('Content-type: application/json');
echo json_encode($personalResult);
?>