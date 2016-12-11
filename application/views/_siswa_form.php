<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Siswa</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="loading"></div>
					<form id="form-siswa">
						<label>Nis :</label>
						<input class="form-control" type="text" name="nis-input" id="nis-input" value="">
						<br>
						<label>Nama :</label>
						<input class="form-control" type="text" name="nama-input" id="nama-input" value="">
						<br>
						<label>Alamat :</label>
						<input class="form-control" type="text" name="alamat-input" id="alamat-input" value="">
						<br>
						<label>Tempat Lahir :</label>
						<input class="form-control" type="text" name="tempat_lahir-input" id="tempat_lahir-input" value="">
						<br>
						<label>Tanggal Lahir :</label>
						<input class="form-control" type="text" name="tgl_lahir-input" id="tgl_lahir-input" value="" placeholder="yyyy-mm-dd">
						<br>
						<label>Jenis Kelamin :</label>
						<select class="form-control" name="jenis_kelamin-input" id="jenis_kelamin-input">
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<label>Agama :</label>
						<select class="form-control" name="agama-input" id="agama-input">
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
						</select>
						<label>Tahun Masuk :</label>
						<input class="form-control" type="text" name="thn_masuk-input" id="thn_masuk-input" value="">
						<br>
						<label>Email :</label>
						<input class="form-control" type="text" name="email-input" id="email-input" value="">
						<br>
						<label>Nomer Telpon :</label>
						<input class="form-control" type="text" name="no_telp-input" id="no_telp-input" value="">
						<br>
						<br>
						<label>Username :</label>
						<input class="form-control" type="text" name="username-input" id="username-input" value="">
						<br>
						<label>Password :</label>
						<input class="form-control" type="password" name="password-input" id="password-input" value="">
						<br>
						<label>Kelas :</label>
						<input class="form-control" type="text" name="kelas-input" id="kelas-input" value="">
						<br>
						<label>Jurusan :</label>
						<input class="form-control" type="text" name="jurusan-input" id="jurusan-input" value="">
						<br>
						<label>Status :</label>
						<select class="form-control" name="status-input" id="status-input">
							<option value="Aktif">Aktif</option>
							<option value="Nonaktif">Nonaktif</option>
						</select>
						<input type="hidden" name="model-input" id="model-input" value="siswa">
						<input type="hidden" name="action-input" id="action-input" value="1">
						<input type="hidden" name="key-input" id="key-input" value="nis">
						<input type="hidden" name="value-input" id="value-input" value="0">

						<button class="btn btn-primary" type="submit" onclick="proses_simpan(); return false;"><i class="fa fa-save"></i> Simpan </button>
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

			<script type="text/javascript">
				$(document).ready(function () {
					<?php
					if ($param) {
						echo 'fillForm("'.$param.'");';
					}
					?>
				});

				function proses_simpan() {
					loading("loading", true);
					setTimeout(function () {
			//ajax jalan
			$.ajax({
				url: base_url + 'manage',
				type: 'POST',
				dataType: "json",
				data: $("#form-siswa").serialize(),
				cache: false,
				success: function (json) {
					loading("loading", false);
					if (json.data.code == 1) {
						alert("Simpan data berhasil");
						loadContent(base_url + 'view/_table_siswa');
					} else if(json.data.code == 2) {
						alert("Simpan data gagal!");
					} else{
						alert(json.data.message);
					}
				},
				error: function () {
					loading("loading", false);
					alert("Respon server gagal!");
				}
			});
		}, 100);
				}

				function fillForm(x) {
					$.ajax({
						url: base_url + 'object',
						data: 'model-input=siswa&key-input=nis&value-input=' + x,
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							if (json['data'].code === 1) {
								$("#nis-input").val(json.data.object.nis);
								$("#nama-input").val(json.data.object.nama);
								$("#alamat-input").val(json.data.object.alamat);
								$("#tempat_lahir-input").val(json.data.object.tempat_lahir);
								$("#jenis_kelamin-input").val(json.data.object.jenis_kelamin);
								$("#agama-input").val(json.data.object.agama);
								$("#thn_masuk-input").val(json.data.object.thn_masuk);
								$("#no_telp-input").val(json.data.object.no_telp);
								$("#email-input").val(json.data.object.email);
								$("#username-input").val(json.data.object.username);
								$("#password-input").val(json.data.object.password);
								$("#kelas-input").val(json.data.object.kelas);
								$("#jurusan-input").val(json.data.object.jurusan);
								$("#status-input").val(json.data.object.status);
								$("#action-input").val("2");
								$("#value-input").val(x);
							}
						}
					});
				}
			</script>