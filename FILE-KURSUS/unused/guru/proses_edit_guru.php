<?php
ob_start();
include_once '../koneksi.php';

$result mysql_query("UPDATE guru SET id_guru = '$POST[id_guru]',nama = '$POST[nama]',matapelajaran = '$POST[matapelajaran]',email = '$POST[email]'");
header('location:tampil_guru.php');
?>