

<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
require '../koneksi.php';
// Create an instance of the class:
$cetak = $_GET['date'];
$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->Image('dishub.jpg', 0, 0, 210, 297, 'jpg', '', true, false);



$data ='
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Kendaraan</title>
	<link rel="stylesheet" href="../aset/css/print.css">
</head>
<body>
	<h1 align="center">Laporan Data Kendaraan</h1>
	<table align="center" border="1" cellpadding="10" cellspacing="0" width="1000px">
	<tr>
	<th>NO</th>
	<th>NOMOR KENDARAAN</th>
	<th>PERUSAHAAN PO</th>
	<th>NAMA SUPIR</th>
	<th>KARTU PENGAWAS</th>
	<th>MASA UJI BERLAKU</th>
	</tr>';
	$no = 1;
	$queryangkutan = mysqli_query ($konek, "SELECT noken, po, supir, kp, tgl, DATE_FORMAT(uji, '%d-%m-%Y')as uji FROM angkutan WHERE tgl BETWEEN '$cetak' ORDER BY tgl DESC");
	while($row = mysqli_fetch_array($queryangkutan)){
	$data .='
	<tr>
	<td align="center">'.$no++.'</td>
	<td>'.$row['noken'].'</td>
	<td>'.$row['po'].'</td>
	<td>'.$row['supir'].'</td>
	<td>'.$row['kp'].'</td>
	<td align="center">'.$row['uji'].'</td>
	</tr>';
	}
	$data .='
</table>
</body>
<div></div>
</html>
';


// Define the Headers before writing anything so they appear on the first page
$mpdf->SetTitle('My Title');

// $mpdf->SetHTMLFooter('
// <table width="100%" style="vertical-align: bottom; font-family: serif; 
//     font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
//     <tr>
//         <td width="33%">Tanggal Cetak : {DATE j-m-Y}</td>
//         <td width="33%" align="center">{PAGENO}/{nbpg}</td>
//         <td width="33%" style="text-align: right;">My document</td>
//     </tr>
// </table>');  // Note that the second parameter is optional : default = 'O' for ODD

// $mpdf->SetHTMLFooter('
// <table width="100%" style="vertical-align: bottom; font-family: serif; 
//     font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
//     <tr>
//         <td width="33%"><span style="font-weight: bold; font-style: italic;">My document</span></td>
//         <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
//         <td width="33%" style="text-align: right; ">{DATE j-m-Y}</td>
//     </tr>
// </table>', 'E');

$mpdf->WriteHTML($data);

// Output a PDF file directly to the browser
$mpdf->Output('Laporan-kendaraan.pdf',\Mpdf\Output\Destination::INLINE);