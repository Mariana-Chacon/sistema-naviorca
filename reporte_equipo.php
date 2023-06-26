  <?php
  require('fpdf/fpdf.php');

  class PDF extends FPDF
  {
    // Cabecera de página
    function Header()
    {
      // Logo
      $this->Image('assets\imagenes\NAVIORCA_NUEVO_HORIZONTAL.png', 10, 8, 70);
      // Arial bold 15
      $this->SetFont('Arial', 'B', 12);
      // Movernos a la derecha
      $this->Ln(35);

      $this->Cell(60);
      // Título
      $this->Cell(70, 10, 'Informe de equipos', 0, 0, 'C');
      // Salto de línea
      $this->Ln(20);

      $this->Cell(15, 10, 'ID', 1, 0, 'C', 0);
      $this->Cell(38, 10, 'Tipo de equipo', 1, 0, 'C', 0);
      $this->Cell(40, 10, 'Marca', 1, 0, 'C', 0);
      $this->Cell(27, 10, 'Modelo', 1, 0, 'C', 0);
      $this->Cell(25, 10, 'Serial', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
      // Posición: a 1,5 cm del final
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial', 'I', 8);
      // Número de página
      $this->Cell(0, 10, utf8_decode('Pagina ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
  }

  require 'config/conexion.php';
  $consulta = "SELECT equipos.*, tipo_equipo.nombre from equipos
               INNER JOIN tipo_equipo ON equipos.tipo_equipo_id = tipo_equipo.id";
  $resultado = $conexion->query($consulta);


  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial', '', 12);

  while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(15, 10, $row['equipo_id'], 1, 0, 'C', 0);
    $pdf->Cell(38, 10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['marca'], 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['modelo'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['serial'], 1, 1, 'C', 0);
  }
  $pdf->Output();
  ?>
