<?php
session_start();
error_reporting(0);
include('../koneksi.php');
require('../fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone
$cetak = $_GET['date'];
$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('dishub/php.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'TUTORIALSWB & TUTORPHPID',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telepon : +62 81524737292',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Mamampang, Keluarahan Garassi, kecamatan Tinggimoncong, Kabupaten Gowa',0,'L');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Report Filter Complaint",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'NOMOR KENDARAAN', 1, 0, 'C');
$pdf->Cell(9, 0.8, 'PERUSAHAAN PO', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'NAMA SUPIR', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'KARTU PENGAWAS', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'MASA UJI BERLAKU', 1, 1, 'C');
$pdf->SetFont('Arial','',9);
$no=1;

$queryangkutan = mysqli_query ($konek, "SELECT noken, po, supir, kp, tgl, DATE_FORMAT(uji, '%d-%m-%Y')as uji FROM angkutan WHERE tgl BETWEEN '$cetak' ORDER BY tgl DESC");
while($row = mysqli_fetch_array($queryangkutan)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['noken'], 1, 0,'C');
	$pdf->Cell(9, 0.8, $lihat['po'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['supir'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['kp'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['uji'], 1, 1,'C');

	$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Approve",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"TUTORIALSWB & TUTORPHPID",0,10,'C');

$pdf->Output("laporan_lendaraan.pdf","I");

?>