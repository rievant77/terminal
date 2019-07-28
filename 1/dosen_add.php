


//if ($add = mysqli_query($konek, "INSERT INTO angkutan (noken, po, supir, uji, naik, turun, kel) VALUES 
//	('$noken', '$po', '$supir', '$uji', '$naik', '$turun', '$kel')")){
	//	header("Location: dosen.php");
	//	exit();
//	}
//die ("Terdapat kesalahan : ". mysqli_error($konek));

<?php
include "../koneksi.php";


if(isset($_POST["simpan"])) {

		$noken 			= $_POST["noken"];
		$po 			= $_POST["po"];
		$supir		 	= $_POST["supir"];
		$kp			 	= $_POST["kp"];
		$uji 			= $_POST["uji"];
		$naik	 		= $_POST["naik"];
		$turun	 		= $_POST["turun"];
		//$jml	 		= $_POST["jml"];
		//$hasil	 		= $naik + $turun;
		$kel	 		= implode(', ' , $_POST['kel']);
		$tgl			= date('Y-m-d');

		mysqli_query($konek, "INSERT INTO angkutan VALUES ('$noken', '$po', '$supir', '$kp', '$uji', '$naik', '$turun', '$kel', '$tgl')");
		header("Location: dosen.php");
	}

		//$sql = mysqli_query ($konek, "SELECT * FROM implode ORDER BY id DESC");
	
		die ("Terdapat kesalahan : ". mysqli_error($konek));



?>