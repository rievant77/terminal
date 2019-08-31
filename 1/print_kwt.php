<?php
session_start();
error_reporting(0);
include('../koneksi.php');
require('../pdf/fpdf.php');
$pdf = new FPDF("P","cm",array(21.5,33));
$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../aset/foto/sugih.jpg',5,1,2,2);
$pdf->SetFont('times','B',10);
$pdf->SetX(4);  
$pdf->MultiCell(15,0.5,'PEMERINTAH KABUPATEN CIANJUR',0,'C');
$pdf->SetFont('times','B',14);
$pdf->SetX(4);            
$pdf->MultiCell(15,0.5,'DINAS PERHUBUNGAN',0,'C');
$pdf->SetFont('times','B',9);
$pdf->SetX(4);
$pdf->MultiCell(15,0.5,'Telepon : (0263) 263424, 2616897 Fax : (0263) 284356',0,'C');    
$pdf->SetFont('times','B',9);
$pdf->SetX(4);
$pdf->MultiCell(15,0.5,'Jl. Dr. Muwardi No. 395, Cianjur, 43215',0,'C');
$pdf->SetX(4);
$pdf->Line(1,3.3,32,3.3);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.4,32,3.4);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('times','B',13);
$pdf->Cell(20,0.7,"SURAT TEGURAN",0,10,'C');
$pdf->ln(0.5);
$pdf->SetFont('times');
$pdf->Cell(0,0.5,'Dasar :',0, 'L');
$pdf->Cell(0,0.5,'1. Undang-undang Republik Indonesia Nomor 22 Tahun 2009 Tentang Lalu lintas dan Angkutan Jalan;',0, 'L');
$pdf->ln(2);
$pdf->Cell(1, 0, 'NAMA : ', 0, 0, 'L');
$pdf->ln(0.5);
$pdf->Cell(1, 0, 'NO KENDARAAN : ', 0, 0, 'L');

$pdf->SetFont('times','',9);

$queryangkutan = mysqli_query ($konek, "SELECT supir, nok, DATE_FORMAT(tgl, '%d-%m-%Y')as tgl FROM angkutan");
while($row = mysqli_fetch_array($queryangkutan)){
    $pdf->Cell(3, 0.8, $row['supir'], 0, 0, 'L');
    $pdf->ln(0.5);
	$pdf->Cell(2.7, 0.8, $row['nok'], 0, 0,'L');
}
$pdf->ln(2);
$pdf->SetFont('times','B',10);
$pdf->Cell(50,0.7,"KEPALA UPTD",0,10,'C');
$pdf->Cell(50,0.7,"TERMINAL PASIRHAYAM",0,10,'C');
$pdf->Cell(50,0.7,"",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('times','B',10);
$pdf->Cell(50,0.7,"(_______________________)",0,10,'C');
$pdf->Cell(50,0.7,"NIP.199797756446",0,10,'C');
$pdf->Output("kwitansi.pdf","I");
?>