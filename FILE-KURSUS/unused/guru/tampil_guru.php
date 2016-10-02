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
			while ($row = mysql_fetch_array($hasil))
			{
				echo "<tr><td> $no </td>";
				echo "<td> $row[nama] </td>";
				echo "<td> $row[matapelajaran] </td>";
				echo "<td> $row[email] </td>";
				echo "<td> <a href=edit_guru.php?id=$row[id_guru]>Edit</a> | <a href=hapus_guru.php?id=$row[id_guru]>Hapus</a></td></tr>";

				$no++;
			}
			echo "</table>";
			?>
		</center>
	</body>
	</html>