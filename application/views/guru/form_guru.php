<!DOCTYPE html>
<html>
<head>
	<title>Form USER</title>
</head>
<body>
	<h2>Form USER</h2>
	<form action="<?php echo base_url('user/simpan');?>" method="POST">
		<label>Username :</label>
		<input type="text" name="username" value="">
		<br>
		<label>Nama :</label>
		<input type="text" name="nama" value="">
		<br>
		<label>Email :</label>
		<input type="text" name="email" value="">
		<br>
		<label>Password :</label>
		<input type="text" name="password" value="">
		<br>
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal" onclick="history.back()">
	</form>
</body>
</html>