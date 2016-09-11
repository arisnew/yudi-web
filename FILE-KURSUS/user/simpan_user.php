<?php
//koneksi
include_once '../koneksi.php';
//data dari form
$username	= $_POST['username'];
$nama	= $_POST['nama'];
$email	= $_POST['email'];
$password	= md5($_POST['password']);

//validasi

//query
$query = "INSERT INTO user(username, nama, email, password) VALUES ('$username','$nama', '$email','$password')";
//eksekusi
$eksekusi = mysql_query($query);
//cek
if ($eksekusi == TRUE) {
	echo '<script>alert("Simpan data berhasil"); window.location = "form_user.php";</script>';
} else {
	echo '<script>alert("Simpan data GAGAL!"); window.location = "form_user.php";</script>';
}