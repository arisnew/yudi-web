<?php 
if (isset($user)) {
	$username = $user->username;
	$nama = $user->nama;
	$email = $user->email;
	$password = $user->password;
} else {
	$username = $nama = $email = $password = '';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form USER</title>
</head>
<body>
	<h2>Form USER</h2>
	<form action="<?php echo base_url('user/update');?>" method="POST">
		<label>Username :</label>
		<input type="text" name="username" value="<?=$username;?>" readonly="">
		<br>
		<label>Nama :</label>
		<input type="text" name="nama" value="<?=$nama;?>">
		<br>
		<label>Email :</label>
		<input type="text" name="email" value="<?=$email;?>">
		<br>
		<label>Password :</label>
		<input type="text" name="password" value="<?=$password;?>">
		<br>
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal" onclick="history.back()">
	</form>
</body>
</html>