<?php
$data_materi = $this->model->getList(array('table' => 'materi', 'where' => array('status' => 'Aktif')));
?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
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
						<form id="form-lampiran" class="form-horizontal">
							<div class="form-group">
								<label for="materi-input" class="col-sm-2 control-label">Materi</label>
								<div class="col-sm-10">
									<select class="form-control" name="materi-input" id="materi-input">
										<?php
										if ($data_materi) {
											foreach ($data_materi as $row) {
												echo '<option value="' . $row->id_materi . '">' . $row->id_materi. ' - ' . $row->judul . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_lampiran-input" class="col-sm-2 control-label">Nama Lampiran</label>
								<div class="col-sm-10">
									<input class="form-control" name="nama_lampiran-input" id="nama_lampiran-input" placeholder="Nama Lampiran" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_file-input" class="col-sm-2 control-label">Nama File</label>
								<div class="col-sm-10">
									<input class="form-control" name="nama_file-input" id="nama_file-input" placeholder="Nama File" type="text">
								</div>
							</div>
							<input type="hidden" name="model-input" id="model-input" value="lampiran">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_lampiran">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="proses_simpan(); return false;"><i class="fa fa-save"></i> Simpan </button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_lampiran')">
						</form>
					</div>
				</div>
			</section>
		</div>

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
						data: $("#form-lampiran").serialize(),
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							loading('loading',false);
							if (json['data'].code === 1) {
								alert('Penyimpanan data berhasil');
								loadContent(base_url + 'view/_table_lampiran');
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
					data: 'model-input=lampiran&key-input=id_lampiran&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#id_lampiran-input").val(json.data.object.id_lampiran).attr("readonly","");
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