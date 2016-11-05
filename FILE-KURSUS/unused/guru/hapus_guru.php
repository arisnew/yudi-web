<?php
ob_start();
include_once '../koneksi.php';
mysql_query("DELETE FROM guru WHERE id_guru = '$GET[id]'");

header('location:tampil_guru.php');
?>