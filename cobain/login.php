<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($db,"select * from admin where username='$username'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
list($id, $username, $pass) = mysqli_fetch_array($data);
if($cek > 0){
	if (password_verify($password, $pass)){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		header("location:admin/index2.php");
	}else{
		echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                  </script>';
        header("location:cobain.php?pesan=gagal");	
	}
}else{
	header("location:cobain.php?pesan=gagal");
}
?>