<?php
//koneksi
include_once '../koneksi.php';
//data dari form
$username	= $_POST['username'];
$nama	= $_POST['nama'];
$email	= $_POST['email'];
$password	= md5($_POST['password']);

//query
$query = "UPDATE user SET nama = '$nama', email = '$email',password = '$password' WHERE username = '$username'";
//eksekusi
$eksekusi = mysql_query($query);
//cek
if ($eksekusi == TRUE) {
	echo '<script>alert("Update data berhasil"); window.location = "index.php";</script>';
} else {
	echo '<script>alert("Update data GAGAL!"); window.location = "index.php";</script>';
}