<?php
include "../koneksi.php";

//$noken 			= $_POST["noken"];
//$supir		 	= $_POST["supir"];
//$uji 			= $_POST["uji"];
//$naik	 		= $_POST["naik"];
//$turun	 		= $_POST["turun"];
//$kel	 		= $_POST["kel"];

//if ($edit = mysqli_query($konek, "UPDATE angkutan SET po='$po', supir='$supir', uji='$uji', 
//	naik='$naik', turun='$turun', kel='$kel' WHERE noken='$noken'")){
//		header("Location: dosen.php");
//		exit();

//die ("Terdapat kesalahan : ". mysqli_error($konek));

	if(isset($_POST["edit"])) {

		$noken 			= $_POST["noken"];
		$po 			= $_POST["po"];
		$supir		 	= $_POST["supir"];
		$kp			 	= $_POST["kp"];
		$uji 			= $_POST["uji"];
		$naik	 		= $_POST["naik"];
		$turun	 		= $_POST["turun"];
		$kel	 		= implode(', ' , $_POST['kel']);
		$tgl			= date('Y-m-d');

		mysqli_query($konek, "UPDATE angkutan SET po='$po', supir='$supir', kp='$kp', uji='$uji', 
						naik='$naik', turun='$turun', kel='$kel', tgl='$tgl' WHERE noken='$noken'");
		header("Location: dosen.php");
	}

		//$sql = mysqli_query ($konek, "SELECT * FROM implode ORDER BY id DESC");
	
		die ("Terdapat kesalahan : ". mysqli_error($konek));

?>