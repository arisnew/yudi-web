<!DOCTYPE html>
<html>
<head>
	<title>List SISWA</title>
</head>
<body>
	<h3>List Siswa</h3>
	<a href="<?php echo base_url('siswa/index');?>">Add User</a>
	<table border="1" width="80%">
		<tr>
			<th>No</th>
			<th>Nis</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Kelas</th>
			<th>Pilihan</th>
		</tr>
		<?php
		if (isset($user)) {
			$no = 1;
			foreach ($user as $row) {
				echo '<tr>';
				echo '<td>' . $no . '</td>';
				echo '<td>' . $row->nis . '</td>';
				echo '<td>' . $row->nama . '</td>';
				echo '<td>' . $row->alamat . '</td>';
				echo '<td>' . $row->kelas . '</td>';
				echo '<td>
					<a href="'.base_url('siswa/edit/'. $row->nis).'">Edit</a> 
					<a onclick="return confirm(\'Yakin HAPUS DATA????\')" href="'.base_url('siswa/delete/'. $row->nis).'">Delete</a> 
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