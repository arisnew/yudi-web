<?php
//variable
$username = '';
$nama = '';
$email = '';

//koneksi
include_once '../koneksi.php';
$query = "SELECT * FROM user WHERE username = '". $_GET['id'] ."'";
//eksekusi
$eksekusi = mysql_query($query);
if (mysql_num_rows($eksekusi) > 0) {
	$data = mysql_fetch_array($eksekusi);
	$username = $data['username'];
	$nama = $data['nama'];
	$email = $data['email'];
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Edit USER</title>
</head>
<body>
	<h2>Form Edit USER</h2>
	<form action="update_user.php" method="POST">
		<label>Username :</label>
		<input type="text" name="username" value="<?=$username?>" readonly>
		<br>
		<label>Nama :</label>
		<input type="text" name="nama" value="<?=$nama?>">
		<br>
		<label>Email :</label>
		<input type="text" name="email" value="<?=$email?>">
		<br>
		<label>Password :</label>
		<input type="text" name="password" value="">
		<br>
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal">
	</form>
</body>
</html>