<?php
$data_materi = $this->model->getList(array('table' => 'materi', 'where' => array('status' => 'Aktif')));
?>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Lampiran</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="loading"></div>
					<form id="form-lampiran">
						<label>ID Lampiran :</label>
						<input class="form-control" type="text" name="id_lampiran-input" id="id_lampiran-input" value="">
						<br>
						<label>ID Matrei :</label>
						<select class="form-control" name="id_materi-input" id="id_materi-input">
							<?php
							if ($data_materi) {
								foreach ($data_materi as $row) {
									echo '<option value="' . $row->id_materi . '"></option>';
								}
							}
							?>
						</select>
						<br>
						<label>Nama Lampiran :</label>
						<input class="form-control" type="text" name="nama_lampiran-input" id="nama_lampiran-input" value="">
						<br>
						<label>Nama File :</label>
						<input class="form-control" type="text" name="nama_file-input" id="nama_file-input" value="">
						<input type="hidden" name="model-input" id="model-input" value="lampiran">
						<input type="hidden" name="action-input" id="action-input" value="1">
						<input type="hidden" name="key-input" id="key-input" value="id_lampiran">
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
				data: $("#form-lampiran").serialize(),
				cache: false,
				success: function (json) {
					loading("loading", false);
					if (json.data.code == 1) {
						alert("Simpan data berhasil");
						loadContent(base_url + 'view/_table_lampiran');
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
						data: 'model-input=lampiran&key-input=id_lampiran&value-input=' + x,
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							if (json['data'].code === 1) {
								$("#id_lampiran-input").val(json.data.object.id_lampiran);
								$("#id_materi-input").val(json.data.object.id_materi);
								$("#nama_lampiran-input").val(json.data.object.nama_lampiran);
								$("#nama_file-input").val(json.data.object.nama_file);
								$("#action-input").val("2");
								$("#value-input").val(x);
							}
						}
					});
				}
			</script>