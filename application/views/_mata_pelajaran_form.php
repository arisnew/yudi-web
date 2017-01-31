<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Mata Pelajaran</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box box-body">
						<div id="loading"></div>
						<form id="form-mata_pelajaran" class="form-horizontal">
						<div class="form-group">
								<label for="kode-mapel-input" class="col-sm-2 control-label">Kode Mata Pelajaran</label>
								<div class="col-sm-10">
									<input class="form-control" name="kode-mapel-input" id="kode-mapel-input" placeholder="Kode Mata Pelajaran" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_mapel-input" class="col-sm-2 control-label">Nama Mata Pelajaran</label>
								<div class="col-sm-10">
									<input class="form-control" name="nama_mapel-input" id="nama_mapel-input" placeholder="Nama Mata Pelajaran" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="status-input" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-10">
									<select class="form-control" name="status-input" id="status-input">
										<option value="Aktif">Aktif</option>
										<option value="Nonaktif">Nonaktif</option>
									</select>
								</div>
							</div>
						<input type="hidden" name="model-input" id="model-input" value="mata_pelajaran">
						<input type="hidden" name="action-input" id="action-input" value="1">
						<input type="hidden" name="key-input" id="key-input" value="kode_mapel">
						<input type="hidden" name="value-input" id="value-input" value="0">

						<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
						<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_mata_pelajaran')">
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
						data: $("#form-mata_pelajaran").serialize(),
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							loading('loading',false);
							if (json['data'].code === 1) {
								alert('Penyimpanan data berhasil');
								loadContent(base_url + 'view/_table_mata_pelajaran');
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
					data: 'model-input=mata_pelajaran&key-input=kode_mapel&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#kode-mapel-input").val(json.data.object.kode_mapel).attr("readonly","");
							$("#nama_mapel-input").val(json.data.object.nama_mapel);
							$("#status-input").val(json.data.object.status);
							$("#action-input").val("2");
							$("#value-input").val(x);
						}
					}
				});
			}
		</script>