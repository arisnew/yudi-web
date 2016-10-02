<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="<?php echo site_url('guru/simpan');?>">

		ID<input type="text" id="id_guru" name="id_guru"><br>
		Nama<input type="text" id="nama" name="nama"><br>
		Mata Pelajaran<input type="text" id="matapelajran" name="matapelajaran"><br>
		Email<input type="text" id="email" name="email"><br>
		<input type="submit" name="submit" value="simpan">
	</form>
</body>
</html>