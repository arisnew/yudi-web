<div class="col-sm-8">
	<form method="POST" action="<?php echo site_url('guru/simpan');?>">
		ID<input class="form-control" type="text" id="id_guru" name="id_guru"><br>
		Nama<input class="form-control" type="text" id="nama" name="nama"><br>
		Mata Pelajaran<input class="form-control" type="text" id="matapelajran" name="matapelajaran"><br>
		Email<input class="form-control" type="text" id="email" name="email"><br>
		<input type="submit" name="submit" value="simpan">
	</form>
</div>