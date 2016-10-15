<section class="content-header">
	<h1>
		Form SISWA
		<small>it all starts here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Examples</a></li>
		<li class="active">Blank page</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form SISWA</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<form action="<?php echo base_url('siswa/simpan');?>" method="POST">
				<label>Nis :</label>
				<input class="form-control" type="text" name="nis" value="">
				<br>
				<label>Nama :</label>
				<input class="form-control" type="text" name="nama" value="">
				<br>
				<label>Alamat :</label>
				<input class="form-control" type="text" name="alamat" value="">
				<br>
				<label>Kelas :</label>
				<input class="form-control" type="text" name="kelas" value="">
				<br>
				<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
				<input type="reset" value="Batal" onclick="history.back()">
			</form>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			Footer
		</div>
		<!-- /.box-footer-->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->