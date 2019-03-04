<?php
require('public/lib/fpdf/fpdf.php');

class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        // Logo
        $this->Image('public/img/2.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',16);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'Reporte de mascotas',0,0,'C');
        // Salto de línea
        $this->Ln(20);
        $this->SetFont('Arial','B',11);
        $this->Cell(10,10,utf8_decode('N°'),1,0,'C',0);
        $this->Cell(20,10,utf8_decode('Código'),1,0,'C',0);
        $this->Cell(25,10,utf8_decode('Nombre'),1,0,'C',0);
        $this->Cell(20,10,utf8_decode('Especie'),1,0,'C',0);
        $this->Cell(25,10,utf8_decode('Raza'),1,0,'C',0);
        $this->Cell(70,10,utf8_decode('Propietario'),1,0,'C',0);
        $this->Cell(20,10,utf8_decode('Fecha'),1,1,'C',0);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

include 'models/clase.php';
$datos = verMascotas();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$nro=0;
while ($ver = mysqli_fetch_array($datos)) { $nro++;

    $pdf->Cell(10,10,$nro,1,0,'C',0);
    $pdf->Cell(20,10,$ver[1],1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($ver[2]),1,0,'C',0);
    $pdf->Cell(20,10,$ver[3],1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($ver[4]),1,0,'C',0);
    $pdf->Cell(70,10,utf8_decode($ver[8]),1,0,'C',0);
    $pdf->Cell(20,10,str_replace('-', '/', date('d-m-Y', strtotime($ver[6]))),1,1,'C',0);

}

$pdf->Output();
?>