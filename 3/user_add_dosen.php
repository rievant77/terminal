<?php

include "../koneksi.php";

$Id_Usergroup_User	= $_POST["Id_Usergroup_User"];
$nama				= $_POST["nama"];
$Username			= $_POST["Username"];
$Password			= $_POST['Password'];
//$Password 			= md5($Password);

if($add = mysqli_query($konek, "INSERT INTO user (Id_Usergroup_User, Username, nama, Password) VALUES ('$Id_Usergroup_User', 
	'$Username', '$nama', '$Password')")){
	header("Location: user.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>