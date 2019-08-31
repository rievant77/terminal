<?php
session_start();
error_reporting(0);
include('../koneksi.php');
require('../pdf/fpdf.php');

$pdf = new FPDF("P", "cm", array(21.5, 33));
$pdf->SetMargins(1, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../aset/foto/sugih.jpg', 5, 1, 2, 2);
$pdf->SetFont('times', 'B', 10);
$pdf->SetX(4);
$pdf->MultiCell(15, 0.5, 'PEMERINTAH KABUPATEN CIANJUR', 0, 'C');
$pdf->SetFont('times', 'B', 14);
$pdf->SetX(4);
$pdf->MultiCell(15, 0.5, 'DINAS PERHUBUNGAN', 0, 'C');
$pdf->SetFont('times', 'B', 9);
$pdf->SetX(4);
$pdf->MultiCell(15, 0.5, 'Telepon : (0263) 263424, 2616897 Fax : (0263) 284356', 0, 'C');
$pdf->SetFont('times', 'B', 9);
$pdf->SetX(4);
$pdf->MultiCell(15, 0.5, 'Jl. Dr. Muwardi No. 395, Cianjur, 43215', 0, 'C');
$pdf->SetX(4);
$pdf->Line(1, 3.3, 32, 3.3);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.4, 32, 3.4);
$pdf->SetLineWidth(0);
$pdf->ln(1);
