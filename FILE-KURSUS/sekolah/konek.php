<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'sekolah';
$db_link = mysql_connect($db_host,$db_user,$db_pass,$db_database);
if ($db_link) {
	# code 'Tidak dapat terhubung ke database'
}