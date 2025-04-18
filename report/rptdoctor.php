<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/hospital/config/global.php");

require_once(ROOT_DIR . "/model/DoctorModel.php");
require(ROOT_CORE.'/fpdf/fpdf.php');

class PDF extends FPDF
{
    function convertxt($p_txt)
    {
        return iconv('UTF-8', 'iso-8859-1', $p_txt);
    }
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "REPORTE DOCTORES ", 0, 1, 'C');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->setFont('Arial', 'I', 8);
        $this->Cell(0, 10, $this->convertxt("Página ") . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$rpt = new DoctorModel();

$records = $rpt->findall();
$records = $records['DATA'];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Cabecera
$pdf->SetFont('Arial', 'B', 12);
$header = array(
    $pdf->convertxt("No."),
    $pdf->convertxt("Nombre"),
    $pdf->convertxt("Apellido Pat"),
    $pdf->convertxt("Apellido Mat"),
    $pdf->convertxt("Direccion"),
    $pdf->convertxt("edad"),
    $pdf->convertxt("sexo"),
    $pdf->convertxt("telefono")
);

// Longitud
$widths = array(10, 25, 30, 30, 45, 15, 15, 20);
for ($i = 0; $i < count($header); $i++) {
    $pdf->Cell($widths[$i], 7, $header[$i], 1);
}
$pdf->Ln();

// Cuerpo
$pdf->SetFont('Arial', '', 10);
foreach ($records as $row) {
    $pdf->Cell($widths[0], 6, $pdf->convertxt($row['iddoctor']), 1);
    $pdf->Cell($widths[1], 6, $pdf->convertxt($row['nombre']), 1);
    $pdf->Cell($widths[2], 6, $pdf->convertxt($row['papellido']), 1);
    $pdf->Cell($widths[3], 6, $pdf->convertxt($row['mapellido']), 1);
    $pdf->Cell($widths[4], 6, $pdf->convertxt($row['direccion']), 1);
    $pdf->Cell($widths[5], 6, $pdf->convertxt($row['edad']), 1);
    $pdf->Cell($widths[6], 6, $pdf->convertxt($row['sexo']), 1);
    $pdf->Cell($widths[7], 6, $pdf->convertxt($row['telefono']), 1);

    $pdf->Ln();
}

$pdf->Output();
?>
