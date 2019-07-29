<?php
session_start();
error_reporting(0);
include('../koneksi.php');
require('../pdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone
$cetak = $_GET['daritgl'];
$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");
$pdf->SetMargins(1.7,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../dishub.png',1.5,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(21,0.5,'DINAS PERHUBUNGAN CIANJUR',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(21,0.5,'Telepon : (0263) 263424',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(21,0.5,'Jl. Dr. Muwardi No. 395, Cianjur, 43215',0,'L');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1.5);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Kendaraan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Tanggal Cetak : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NOMOR KENDARAAN', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'PERUSAHAAN PO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NAMA SUPIR', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'KARTU PENGAWAS', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'MASA UJI BERLAKU', 1, 1, 'C');
$pdf->SetFont('Arial','',9);

$no=1;

$queryangkutan = mysqli_query ($konek, "SELECT noken, po, supir, kp, tgl, DATE_FORMAT(uji, '%d-%m-%Y')as uji FROM angkutan WHERE tgl BETWEEN '$cetak' ORDER BY tgl DESC");
while($row = mysqli_fetch_array($queryangkutan)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(5, 0.8, $row['noken'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $row['po'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $row['supir'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $row['kp'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $row['uji'], 1, 1,'C');

	$no++;
}
$pdf->ln(3);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"TTD",0,10,'C');
$pdf->Cell(40.5,0.7,"KEPALA PENGAWAS",0,10,'C');

$pdf->ln(2);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"(_______________________)",0,10,'C');


$pdf->Output("laporan_lendaraan.pdf","I");

?>