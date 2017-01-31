<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form kelas</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box box-body">
						<div id="loading"></div>
						<form id="form-kelas" class="form-horizontal">
							<div class="form-group">
								<label for="kode_kelas-input" class="col-sm-2 control-label">Kode Kelas</label>
								<div class="col-sm-10">
									<input class="form-control" name="kode_kelas-input" id="kode_kelas-input" placeholder="Kode Kelas" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_kelas-input" class="col-sm-2 control-label">Nama Kelas</label>
								<div class="col-sm-10">
									<input class="form-control" name="nama_kelas-input" id="nama_kelas-input" placeholder="Nama Kelas" type="text">
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
							<input type="hidden" name="model-input" id="model-input" value="kelas">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="kode_kelas">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_kelas')">
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
						data: $("#form-kelas").serialize(),
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							loading('loading',false);

							if (json['data'].code === 1) {
								alert('Penyimpanan data berhasil');
								loadContent(base_url + 'view/_table_kelas');
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
				}, 1000);
			}

			function fillForm(x) {
				$.ajax({
					url: base_url + 'object',
					data: 'model-input=kelas&key-input=kode_kelas&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#kode_kelas-input").val(json.data.object.kode_kelas);
							$("#nama_kelas-input").val(json.data.object.nama_kelas);
							$("#status-input").val(json.data.object.status);
                    $("#action-input").val("2");	//edit
                    $("#value-input").val(x);
                }
            }
        });
			}
		</script>