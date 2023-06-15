<?php
require('./fpdf.php');
//include "./config/conexion.php";
class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include "../../config/conexion.php";llamamos a la conexion BD
      $this->Image('logo.png', 20, 10, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(70); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
       $this->Ln(20); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 67, 89);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("EQUIPOS DISPONIBLES "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(0, 32, 46); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('Id'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Tipo de equipo'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Marca'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Modelo'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Serial'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('Imagen'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include "./config/conexion.php";
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */
$pdf->Cell(18, 10, utf8_decode(""), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode(""), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode(""), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode(""), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode(""), 1, 0, 'C', 0);
$pdf->Cell(50, 10, utf8_decode(""), 1, 1, 'C', 0);


$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
