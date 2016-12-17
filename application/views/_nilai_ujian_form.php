<?php
$data_siswa = $this->model->getList(array('table' => 'siswa', 'where' => array('status' => 'Aktif')));
$data_mata_pelajaran = $this->model->getList(array('table' => 'jurusan', 'where' => array('status' => 'Aktif')));
?>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Ujian </h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="loading"></div>
					<form id="form-nilai_ujian">
						<label>ID Ujian :</label>
						<input class="form-control" type="text" name="id_ujian-input" id="id_ujian-input" value="">
						<br>
						<label>NIS :</label>
						<select class="form-control" name="nis-input" id="nis-input">
						<?php
							if ($data_siswa) {
								foreach ($data_siswa as $row) {
									echo '<option value="' . $row->nis . '">' . $row->nama . '</option>';
								}
							}
							?>
						<br>
						<label>Jumlah Benar :</label>
						<input class="form-control" type="text" name="email-input" id="email-input" value="">
						<br>
						<label>Jumlah Salah :</label>
						<input class="form-control" type="text" name="jumlah_salah-input" id="jumlah_salah-input" value="">
						<br>
						<label>Tanggal Ujian :</label>
						<input class="form-control" type="text" name="jumlah_salah-input" id="jumlah_salah-input" value="">
						<br>
						<label>Kode Mata Pelajaran :</label>
						<select class="form-control" name="kode_mapel-input" id="kode_mapel-input">
						<?php
							if ($data_mata_pelajaran) {
								foreach ($data_mata_pelajaran as $row) {
									echo '<option value="' . $row->kode_mapel . '">' . $row->nama_mapel . '</option>';
								}
							}
							?>
						<br>
						<label>Nilai :</label>
						<input class="form-control" type="text" name="nilai-input" id="nilai-input" value="">
						<br>
						<input type="hidden" name="model-input" id="model-input" value="nilai_ujian">
						<input type="hidden" name="action-input" id="action-input" value="1">
						<input type="hidden" name="key-input" id="key-input" value="id_ujian">
						<input type="hidden" name="value-input" id="value-input" value="0">

						<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
						<input type="reset" value="Batal" onclick="history.back()">
					</form>
				</div>
				<div class="box-footer">
					Footer
				</div>
			</div>
		</section>
		<script type="text/javascript">
			$(document).ready(function () {
				<?php
				if ($param) {
					echo 'fillForm("'.$param.'");';
				}
				?>
			});

			function simpan_data() {
				loading('loading', true);
				setTimeout(function() {
					$.ajax({
						url: base_url + 'manage',
						data: $("#form-nilai_ujian").serialize(),
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							loading('loading',false);
							if (json['data'].code === 1) {
								alert('Penyimpanan data berhasil');
								loadContent(base_url + 'view/_table_nilai_ujian');
							} else if(json['data'].code === 2){
								alert('Penyimpanan data tidak berhasil');
							} else{
								alert(json['data'].message);
							}
						},
						error: function () {
							loading('loading',false);
							alert('An error accurred');
						}
					});
				}, 100);
			}

			function fillForm(x) {
				$.ajax({
					url: base_url + 'object',
					data: 'model-input=nilai_ujian&key-input=id_ujian&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#id_ujian-input").val(json.data.object.id_ujian).attr("readonly","");
							$("#nis-input").val(json.data.object.nis);
							$("#jumlah_benar-input").val(json.data.object.jumlah_benar);
							$("#jumlah_salah-input").val(json.data.object.jumlah_salah);
							$("#tgl_ujian-input").val(json.data.object.tgl_ujian);
							$("#kode_mapel-input").val(json.data.object.kode_mapel);
							$("#nilai-input").val(json.data.object.nilai);
							$("#action-input").val("2");
							$("#value-input").val(x);
						}
					}
				});
			}
		</script>