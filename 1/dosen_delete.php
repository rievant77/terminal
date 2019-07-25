<?php

include "../koneksi.php";

$noken	= $_GET["noken"];

if($delete = mysqli_query ($konek, "DELETE FROM angkutan WHERE noken='$noken'")){
	header("Location: dosen.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>