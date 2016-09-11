<?php
ob_start();
include_once '../koneksi.php';
$query = "UPDATE guru SET nama = '$_POST[nama]',matapelajaran = '$_POST[matapelajaran]',email = '$_POST[email]' WHERE id_guru = '$_POST[id_guru]'";
$result = mysql_query($query);
if ($result == TRUE) {
	//header('location:tampil_guru.php');
	echo '<script>alert("Edit sukses"); window.location ="tampil_guru.php"</script>';
} else {
	echo '<script>alert("Edit gagal"); window.location ="tampil_guru.php"</script>';
}
?>