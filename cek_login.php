<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$pwd = $_POST['pwd'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($konek,"select * from user1 where username='$username' and pwd='$pwd'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['lvl']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['lvl'] = "admin";
		// alihkan ke halaman dashboard admin
		header("Location: 1/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['lvl']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['lvl'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("Location: 2/index.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['lvl']=="kadis"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['lvl'] = "kadis";
		// alihkan ke halaman dashboard pengurus
		header("Location: 3/index.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>