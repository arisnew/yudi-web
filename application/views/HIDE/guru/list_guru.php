<!DOCTYPE html>
<html>
<head>
	<title>List GURU</title>
</head>
<body>
	<h3>List GURU</h3>
	<a href="<?php echo base_url('guru/index');?>">Add User</a>
	<table border="1" width="80%">
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>Nama</th>
			<th>Mata Pelajaran</th>
			<th>Email</th>
			<th>Pilihan</th>
		</tr>
		<?php
		if (isset($guru)) {
			$no = 1;
			foreach ($guru as $row) {
				echo '<tr>';
				echo '<td>' . $no . '</td>';
				echo '<td>' . $row->id_guru . '</td>';
				echo '<td>' . $row->nama . '</td>';
				echo '<td>' . $row->matapelajaran . '</td>';
				echo '<td>' . $row->email . '</td>';
				echo '<td>
					<a href="'.base_url('guru/edit/'. $row->id_guru).'">Edit</a> 
					<a onclick="return confirm(\'Yakin HAPUS DATA????\')" href="'.base_url('guru/delete/'. $row->id_guru).'">Delete</a> 
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