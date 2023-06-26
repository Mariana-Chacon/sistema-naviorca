<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets\imagenes\NAVIORCA_NUEVO_HORIZONTAL.png',10,8,70);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Ln(35);
     
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Informe de equipos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(50, 10, 'Orden id', 1, 0, 'C',0);
    $this->Cell(30, 10, 'Equipo', 1, 0, 'C',0);
    $this->Cell(40, 10, 'Fecha de inicio', 1, 0, 'C',0);
    $this->Cell(30, 10, 'Proximo mantenimiento', 1, 1, 'C',0);
    $this->Cell(30, 10, 'Actividad por hacer', 1, 1, 'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode ('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'config/conexion.php';
$consulta = "SELECT orden.*, personal.nombre, equipos.modelo, tipo_equipo.nombre AS nombre_equipo from orden
            LEFT JOIN personal ON orden.personal_id = personal.personal_id
            INNER JOIN equipos ON orden.equipo_id = equipos.equipo_id
            INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id
            WHERE orden.tipo_mantenimiento_id = 1
            ORDER BY orden.fecha_emision DESC";
    $resultado = $conexion->query($consulta);



$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
  $pdf->Cell(30, 10, $row[ 'orden_id'], 1, 0, 'C',0);
  $pdf->Cell(50, 10, $row[ 'nombre_equipo']. " - " . $row['modelo'], 1, 0, 'C',0);
  $pdf->Cell(30, 10, $row[ 'fecha_inicio'], 1, 0, 'C',0);
  $pdf->Cell(40, 10, $row[ 'intervalo_dias'], 1, 0, 'C',0);
  $pdf->Cell(30, 10, $row[ 'descripcion_asignacion'], 1, 1, 'C',0);

}
$pdf->Output();
?>



<!--DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORME</title>
</head>
<body>
    <img src="assets/imagenes/NAVIORCA_NUEVO_HORIZONTAL.png" alt="" style="width: 300px; margin: 30px;">
    <h1 style="text-align: center;">INFORME FINAL</h1>
    <ul class="list-group">
        <li class="list-group-item">Nombre del equipo: [Nombre del equipo]</li>
        <li class="list-group-item">Fecha de mantenimiento: [Fecha de mantenimiento]</li>
        <li class="list-group-item">Técnico responsable: [Nombre del técnico responsable]</li>
      </ul>
<h2>Resumen del mantenimiento:</h2>
<p>El mantenimiento preventivo se llevó a cabo en el equipo [Nombre del equipo] el día [Fecha de mantenimiento] por el técnico responsable [Nombre del técnico responsable]. Durante el mantenimiento, se realizaron las siguientes tareas:

- Revisión general del equipo para detectar posibles problemas.
- Limpieza y lubricación de las partes móviles del equipo.
- Verificación y ajuste de los niveles de fluidos, si corresponde.
- Verificación y ajuste de las presiones de los neumáticos, si corresponde.
- Verificación y ajuste de los sistemas eléctricos y electrónicos, si corresponde.
</p>
Resultados del mantenimiento:
El equipo [Nombre del equipo] se encuentra en buen estado general y no se detectaron problemas significativos durante el mantenimiento preventivo. Se realizaron las tareas de mantenimiento necesarias para asegurar el correcto funcionamiento del equipo y prevenir problemas futuros.

Recomendaciones:
Se recomienda realizar un mantenimiento preventivo en el equipo [Nombre del equipo] cada [Período recomendado para el mantenimiento preventivo] para asegurar su funcionamiento óptimo y prevenir problemas futuros.
<br>
<br>
<br>
<span>Firma del técnico responsable: ______________________________</span>

</body>
</html>