<?php

session_start();
error_reporting(0);
include "../koneksi.php";

$conten ='
<style>
.table { border-collapse:collapse; }
.table th { padding:8px 5px; background-color:#f60; color#fff; }
</style>
';

$conten .= '
<page>
<div style="padding:4mm; border:1px solid;" align="center">
<span style="font-size:25px;">Laporan Data Kendaraan</span>
</div>
<p>
<table border="1px" class="table" align="center">
<tr>
<th>No</th>
<th>No. Kendaraan</th>
<th>Perusahaan PO</th>
<th>Nama Sopir</th>
<th>Kartu Pengawas</th>
<th>Masa Berlaku Uji</th>
</tr>';
$no = 1;
$tampil = $angkutan->tampil();
while ($data = $tampil->fetch_object()) {
	$conten .= '	
<tr>
<td align="center">'.$no++.'</td>
<td>'.$data->noken.'</td>
<td>'.$data->po.'</td>
<td>'.$data->supir.'</td>
<td>'.$data->kp.'</td>
<td>'.$data->uji.'</td>
</tr>

	';
}
$conten .='
</table>
</p>

</page>';
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P','A4','en');
$html2pdf->writeHTML($conten);
$html2pdf->output('laporan.pdf');
?>
