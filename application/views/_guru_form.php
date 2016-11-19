<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Guru</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
			<form id="form-guru">
				<label>Nip :</label>
				<input class="form-control" type="text" name="nip-input" id="nip-input" value="">
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
				<label>Jenis Kelamin :</label>
				<select class="form-control" name="jens_kelamin-input" id="jens_kelamin-input">
					<option value="Laki_laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
				<label>Agama :</label>
				<select class="form-control" name="agama-input" id="agama-input">
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen</option>
					<option value="Hindu">Hindu</option>
					<option value="Budha">Budha</option>
				</select>
				<br>
				<label>Nomer Telpon :</label>
				<input class="form-control" type="text" name="no_telp-input" id="no_telp-input" value="">
				<br>
				<label>Email :</label>
				<input class="form-control" type="text" name="email-input" id="email-input" value="">
				<br>
				<label>Status Pegawai :</label>
				<select class="form-control" name="status_pegawai-input" id="status_pegawai-input">
					<option value="Tetap">Tetap</option>
					<option value="Kontrak">Kontrak</option>
				</select>
				<label>Username :</label>
				<input class="form-control" type="text" name="username-input" id="username-input" value="">
				<br>
				<label>Password :</label>
				<input class="form-control" type="password" name="password-input" id="password-input" value="">
				<br>
				<label>Status :</label>
				<select class="form-control" name="status-input" id="status-input">
					<option value="Aktif">Aktif</option>
					<option value="Nonaktif">Nonaktif</option>
				</select>
				<input type="hidden" name="model-input" id="model-input" value="guru">
				<input type="hidden" name="action-input" id="action-input" value="1">
				<input type="hidden" name="key-input" id="key-input" value="nip">
				<input type="hidden" name="value-input" id="value-input" value="0">

				<button class="btn btn-primary" type="submit" onclick="proses_simpan(); return false;"><i class="fa fa-save"></i> Simpan</button>
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
				data: $("#form-guru").serialize(),
				cache: false,
				success: function (json) {
					loading("loading", false);
					if (json.data.code == 1) {
						alert("Simpan data berhasil");
						loadContent(base_url + 'view/_table_guru');
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
		}, 2000);
	}

	function fillForm(x) {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=guru&key-input=nip&value-input=' + x,
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json['data'].code === 1) {
                    $("#nip-input").val(json.data.object.nip);
                    $("#nama-input").val(json.data.object.nama);
                    $("#alamat-input").val(json.data.object.alamat);
                    $("#tempat_lahir-input").val(json.data.object.tempat_lahir);
                    $("#jenis_kelamin-input").val(json.data.object.jenis_kelamin);
                    $("#agama-input").val(json.data.object.agama);
                    $("#no_telp-input").val(json.data.object.no_telp);
                    $("#email-input").val(json.data.object.email);
                    $("#status_pegawai-input").val(json.data.object.status_pegawai);
                    $("#username-input").val(json.data.object.username);
                    $("#password-input").val(json.data.object.password);
                    $("#status-input").val(json.data.object.status);
                    $("#action-input").val("2");
                    $("#value-input").val(x);
                }
            }
        });
    }
</script>