<!DOCTYPE html>
<html>
<head>
	<title>EDIT</title>
</head>
<body>
	<center>
		<?php
		include_once "../koneksi.php";
		$edit = mysql_query("SELECT * FROM guru WHERE id_guru='$_GET[id]'");
		$row = mysql_fetch_array($edit);
		echo "<h2>Edit User</h2>
		<form method='POST' action='proses_edit_guru.php'>
			<input type='hidden' name='id_guru value' ='$row[id_guru]'>
			<table bordercolor='#000099'>
				<tr><td>ID</td>
					<td> : <input type='text' name=id_guru value='$row[id_guru]'></td></tr>
					<tr><td>Nama</td>
						<td> : <input type='text' name=nama value='$row[nama]'></td></tr>
						<tr><td>mata pelajaran</td>
							<td> : <input type='text' name=matapelajaran value='$row[matapelajaran]'></td></tr>
							<tr><td>email</td>
								<td> : <input type='text' name=email value='$row[email]'></td></tr>
								<tr><td colspan=2><input type=submit value=update>
								</table></form>";
								?>
							</center>
						</body>
						</html>