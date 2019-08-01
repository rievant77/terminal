<?php
session_start();
error_reporting(0);

include('../koneksi.php');
require('../pdf/fpdf.php');

$cetak = $_GET['daritgl'];

$pdf = new FPDF("L","cm",array(21.5,33));
$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../aset/foto/sugih.jpg',10,1,2,2);
$pdf->SetFont('times','B',10);
$pdf->SetX(4);  
$pdf->MultiCell(25,0.5,'PEMERINTAH KABUPATEN CIANJUR',0,'C');
$pdf->SetFont('times','B',14);
$pdf->SetX(4);            
$pdf->MultiCell(25,0.5,'DINAS PERHUBUNGAN',0,'C');
$pdf->SetFont('times','B',9);
$pdf->SetX(4);
$pdf->MultiCell(25,0.5,'Telepon : (0263) 263424, 2616897 Fax : (0263) 284356',0,'C');    
$pdf->SetFont('times','B',9);
$pdf->SetX(4);
$pdf->MultiCell(25,0.5,'Jl. Dr. Muwardi No. 395, Cianjur, 43215',0,'C');
$pdf->SetX(4);
$pdf->Line(1,3.3,32,3.3);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.4,32,3.4);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('times','B',13);
$pdf->Cell(31,0.7,"Laporan Data Kendaraan",0,10,'C');
$pdf->ln(0.5);
$pdf->SetFont('times','B',8);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2.7, 0.8, 'NO KENDARAAN', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'PERUSAHAAN PO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NAMA SUPIR', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'KARTU PENGAWAS', 1, 0, 'C');
$pdf->Cell(3.1, 0.8, 'MASA UJI BERLAKU', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'NAIK', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'TURUN', 1, 0, 'C');
$pdf->Cell(1.6, 0.8, 'JUMLAH', 1, 0, 'C');
$pdf->Cell(10.6, 0.8, 'KELENGKAPAN', 1, 1, 'C');
$pdf->SetFont('times','',9);

$no=1;

$queryangkutan = mysqli_query ($konek, "SELECT noken, po, supir, kp, tgl, DATE_FORMAT(uji, '%d-%m-%Y')as uji , naik, turun, jml, kel FROM angkutan WHERE tgl BETWEEN '$cetak' ORDER BY tgl DESC");
while($row = mysqli_fetch_array($queryangkutan)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(2.7, 0.8, $row['noken'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $row['po'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $row['supir'],1, 0, 'L');
	$pdf->Cell(3, 0.8, $row['kp'],1, 0, 'C');
	$pdf->Cell(3.1, 0.8, $row['uji'], 1, 0,'C');
	$pdf->Cell(1.5, 0.8, $row['naik'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $row['turun'],1, 0, 'C');
	$pdf->Cell(1.6, 0.8, $row['jml'],1, 0, 'C');
	$pdf->Cell(10.6, 0.8, $row['kel'],1, 1, 'L');

	$no++;
}
$pdf->ln(2);
$pdf->SetFont('times','B',10);
$pdf->Cell(50,0.7,"TTD",0,10,'C');
$pdf->Cell(50,0.7,"KEPALA PENGAWAS",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('times','B',9);
$pdf->Cell(50,0.7,"(_______________________)",0,10,'C');

$pdf->Output("laporan_kendaraan_filter.pdf","I");
?>