<!DOCTYPE html>
<html>
<head>
	<title>GURU</title>
</head>
<body>
	<center>
		<table border="1" bordercolor="#0000CC">
			<tr><th>No</th><th>nama</th><th>mata pelajaran</th><th>email</th><th>Aksi</th></tr>
<?php
include_once "../koneksi.php";
$tampil ="SELECT * FROM guru";
$hasil = mysql_query($tampil);
$no = 1;
if(mysql_num_rows($hasil) > 0){
	while ($data = mysql_fetch_array($hasil))
	{
		echo "<tr><td> $no </td>";
		echo "<td>". $data['nama'] ."</td>";
		echo "<td>". $data['matapelajaran'] ."</td>";
		echo "<td>". $data['email'] ."</td>";
		echo "<td> <a href=edit_guru.php?id=".$data['id_guru'].">Edit</a> | <a href='hapus_guru.php?id=".$data['id_guru']."' onclick='return confirm(\"Yakin hapus data?\");'>Hapus</a></td></tr>";

		$no++;
	}
} else {
	echo '<tr><td colspan="5">Tidak ada data! <a href ="index.php"> Tambah baru</a></td></tr>';
}
echo "</table>";
?>
	</center>
</body>
</html>