<?php 
if (isset($siswa)) {
	$nis = $siswa->nis;
	$nama = $siswa->nama;
	$alamat = $siswa->alamat;
	$kelas = $siswa->kelas;
} else {
	$nis = $nama = $alamat = $kelas = '';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form SISWA</title>
</head>
<body>
	<h2>Form SISWA</h2>
	<form action="<?php echo base_url('siswa/update');?>" method="POST">
		<label>Nis :</label>
		<input type="text" name="nis" value="<?=$nis;?>" readonly="">
		<br>
		<label>Nama :</label>
		<input type="text" name="nama" value="<?=$nama;?>">
		<br>
		<label>Alamat :</label>
		<input type="text" name="alamat" value="<?=$alamat;?>">
		<br>
		<label>Kelas :</label>
		<input type="text" name="kelas" value="<?=$kelas;?>">
		<br>
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal" onclick="history.back()">
	</form>
</body>
</html>