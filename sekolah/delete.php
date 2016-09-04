<?php
include_once '../koneksi.php';
$nis	= $_GET['nis'];

$sql 	= 'delete from siswa where nis="'.$nis.'"';
$query	= mysql_query($sql);
header('location: siswa.php');
?>