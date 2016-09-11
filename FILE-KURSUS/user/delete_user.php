<?php
//koneksi
include_once '../koneksi.php';
$query = "DELETE FROM user WHERE username = '". $_GET['id'] ."'";
//eksekusi
$eksekusi = mysql_query($query);
if ($eksekusi == TRUE) {
	echo "<script>alert('Hapus berhasil'); window.location = 'index.php'</script>";
} else {
	echo "<script>alert('Hapus data GAGAL'); window.location = 'index.php'</script>";
}