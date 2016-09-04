<?
$db_host = 'localhost';
$db_usn = 'root';
$db_pwd = 'Admin';
$db_name = 'learning';
$db_link = mysqli_connect($db_host,$db_usn,$db_pwd,$db_name);
if (!$db_link) {
	echo 'Tidak dapat terhubung ke database';
}
?>