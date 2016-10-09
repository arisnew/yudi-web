<!DOCTYPE html>
<html>
<head>
	<title>List USER</title>
</head>
<body>
	<h3>List User</h3>
	<a href="<?php echo base_url('user/index');?>">Add User</a>
	<table border="1" width="80%">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Pilihan</th>
		</tr>
		<?php
		if (isset($user)) {
			$no = 1;
			foreach ($user as $row) {
				echo '<tr>';
				echo '<td>' . $no . '</td>';
				echo '<td>' . $row->username . '</td>';
				echo '<td>' . $row->nama . '</td>';
				echo '<td>' . $row->email . '</td>';
				echo '<td>
					<a href="'.base_url('user/edit/'. $row->username).'">Edit</a> 
					<a onclick="return confirm(\'Yakin HAPUS DATA????\')" href="'.base_url('user/delete/'. $row->username).'">Delete</a> 
				</td>';
				echo '</tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan ="5">Tidak ada data</td></tr>';
		}
		?>
	</table>
</body>
</html>