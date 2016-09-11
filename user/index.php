<!DOCTYPE html>
<html>
<head>
	<title>All USER</title>
</head>
<body>
	<h3>All USER</h3>
	<table width="80%" border="1">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Pilihan</th>
		</tr>
		<?php
		//koneksi
		include_once '../koneksi.php';
		$query = "SELECT * FROM user";
		$eksekusi = mysql_query($query);
		if (mysql_num_rows($eksekusi) > 0) {
			$no = 1;
			while ($data = mysql_fetch_array($eksekusi)) {
				?>
				<tr>
					<td><?=$no?></td>
					<td><?=$data['username']?></td>
					<td><?=$data['nama']?></td>
					<td><?=$data['email']?></td>
					<td>
						<a href="edit_user.php?id=<?=$data['username']?>">Edit</a>
						<a href="delete_user.php?id=<?=$data['username']?>" onclick="return confirm('Yakin akan dihapus?');">Delete</a>
					</td>
				</tr>
				<?php
				$no++;
			}
		} ?>
	</table>
</body>
</html>