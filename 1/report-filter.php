

<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
require '../koneksi.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

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
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
	<th>NO</th>
	<th>NOMOR KENDARAAN</th>
	<th>PERUSAHAAN PO</th>
	<th>NAMA SUPIR</th>
	<th>KARTU PENGAWAS</th>
	<th>MASA UJI BERLAKU</th>
	</tr>';
	$no = 1;
	$queryangkutan = mysqli_query ($konek, "SELECT noken, po, supir, kp, DATE_FORMAT(uji, '%d-%m-%Y')as uji FROM angkutan");
	while($row = mysqli_fetch_array($queryangkutan)){
	$data .='
	<tr>
	<td>'.$no++.'</td>
	<td>'.$row['noken'].'</td>
	<td>'.$row['po'].'</td>
	<td>'.$row['supir'].'</td>
	<td>'.$row['kp'].'</td>
	<td>'.$row['uji'].'</td>
	</tr>';
	}
	$data .='
</table>
</body>
</html>
';
// Write some HTML code:
$mpdf->SetHeader('Report||{PAGENO}');

$mpdf->WriteHTML($data);

// Output a PDF file directly to the browser
$mpdf->Output('Laporan-kendaraan.pdf',\Mpdf\Output\Destination::INLINE);