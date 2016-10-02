<?php 
if (isset($guru)) {
	$id_guru = $guru->id_guru;
	$nama = $guru->nama;
	$email = $guru->email;
	$mapel = $guru->matapelajaran;
} else {
	$id_guru = $nama = $email = $mapel = '';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Guru</title>
</head>
<body>
	<h2>Form Guru</h2>
	<form action="<?php echo base_url('guru/update');?>" method="POST">
		<label>ID Guru :</label>
		<input type="text" name="id_guru" value="<?=$id_guru;?>" readonly="">
		<br>
		<label>Nama :</label>
		<input type="text" name="nama" value="<?=$nama;?>">
		<br>
		<label>Email :</label>
		<input type="text" name="email" value="<?=$email;?>">
		<br>
		<label>Matapelajaran :</label>
		<input type="text" name="matapelajaran" value="<?=$mapel;?>">
		<br>
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal" onclick="history.back()">
	</form>
</body>
</html>