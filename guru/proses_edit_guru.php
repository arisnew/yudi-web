<?php
ob_start();
include_once '../koneksi.php';

mysql_query("UPDATE data_guru SET id_guru = '$POST[id_guru]',nama = '$POST[nama]',matapelajaran = '$POST[matapelajaran]',email = '$POST[email]'");
header('location:tampil_guru.php');
?>