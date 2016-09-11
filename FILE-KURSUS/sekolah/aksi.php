<?php
include_once '../koneksi.php';
if(isset($_POST['tambah'])){ //['tambah'] merupakan name dari button di form tambah
	$nis	= $_POST['nis'];
	$nama	= $_POST['nama'];
	$alamat	= $_POST['alamat'];
	$kelas	= $_POST['kelas'];

	$sql	= 'insert into siswa (nis,nama,alamat,kelas) values ("'.$nis.'","'.$nama.'","'.$alamat.'","'.$kelas.'")';
	$query	= mysql_query($sql);

	if($query){
		header('location: siswa.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
	} else{
		echo 'Gagal';
	}
} elseif(isset($_POST['edit'])){
	$nis	= $_POST['nis'];
	$nama	= $_POST['nama'];
	$alamat	= $_POST['alamat'];
	$kelas	= $_POST['kelas'];
	
	$sql	= 'update siswa set nama="'.$nama.'", alamat="'.$alamat.'", kelas="'.$kelas.'" WHERE nis="'.$nis.'"';
	$query	= mysql_query($sql);
	
	if($query){
		header('location: siswa.php');
	} else{
		echo 'Gagal';
	}
} else {
	echo 'Bad Request!';
}
?>