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
