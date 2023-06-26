<?php
include "../../config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "invalid method";
  return;
}

try {
  $id = $_GET['id'];

  $body = json_decode(file_get_contents('php://input'));

  $informacion_informe = $body->informacion_informe;

  $sql = "SELECT orden.fecha_inicio, orden.fecha_finalizacion, orden.descripcion_asignacion, personal.nombre AS nombre_personal, equipos.marca, equipos.modelo, equipos.serial, tipo_equipo.nombre AS tipo_equipo FROM orden
          INNER JOIN personal ON orden.personal_id = personal.personal_id
          INNER JOIN equipos ON orden.equipo_id = equipos.equipo_id
          INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id
          WHERE orden_id = '$id'";
  $sentenciaSQL = $conexion->prepare($sql);
  $sentenciaSQL->execute();

  $data = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

  $sql = "UPDATE orden SET fecha_inicio = NULL, fecha_finalizacion = NOW() WHERE orden_id = '$id'";
  $sentenciaSQL = $conexion->prepare($sql);
  $sentenciaSQL->execute();

  $sql = "INSERT INTO informes(orden_id, nombre_personal, fecha_finalizacion, tipo_equipo, marca_equipo, modelo_equipo, serial_equipo, descripcion_asignacion, informacion_informe) VALUES ($id, '$data[nombre_personal]', NOW(), '$data[tipo_equipo]', '$data[marca]', '$data[modelo]', '$data[serial]', '$data[descripcion_asignacion]', '$informacion_informe')";
  $sentenciaSQL = $conexion->prepare($sql);
  $sentenciaSQL->execute();

  header('Content-type: application/json');
  echo json_encode(array(
    'updated' => true,
    'data' => $data
  ));
} catch (Exception $ex) {
  header('Content-type: application/json');
  echo json_encode(array(
    'error' => $ex->getMessage()
  ));
}
?>