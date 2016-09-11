<?php
ob_start();
include_once "../koneksi.php";
mysql_query("INSERT INTO guru(id_guru,nama,matapelajaran,email)VALUES('$_POST[id_guru]','$_POST[nama]','$_POST[matapelajaran]','$_POST[email]')");
header('location:tampil_guru.php');

?>