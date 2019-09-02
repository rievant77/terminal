<?php

include "../koneksi.php";

$id	= $_GET["id"];

if ($delete = mysqli_query($konek, "DELETE FROM angkutan WHERE id='$id'")) {
	header("Location: dosen.php");
	exit();
}
die("Terdapat Kesalahan : " . mysqli_error($konek));
