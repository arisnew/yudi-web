<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Pesan</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div id="loading"></div>
						<form id="form-pesan" class="form-horizontal">
							<div class="form-group">
								<label for="judul-input" class="col-sm-2 control-label">Judul</label>
								<div class="col-sm-10">
									<input class="form-control" name="judul-input" id="judul-input" placeholder="Judul" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="isi-input" class="col-sm-2 control-label">Isi</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="isi-input" id="isi-input" placeholder="Isi" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="dari-input" class="col-sm-2 control-label">Dari</label>
								<div class="col-sm-10">
									<input class="form-control" name="dari-input" id="dari-input" placeholder="dari" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="ke-input" class="col-sm-2 control-label">Ke</label>
								<div class="col-sm-10">
									<input class="form-control" name="ke-input" id="ke-input" placeholder="ke" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="publish-input" class="col-sm-2 control-label">Type Pesan</label>
								<div class="col-sm-10">								
									<select class="form-control" name="type_pesan-input" id="type_pesan-input">
										<option value="Siswa-Siswa">Siswa-Siswa</option>
										<option value="Guru-Guru">Guru-Guru</option>
										<option value="Siswa-Guru">Siswa-Guru</option>
										<option value="Guru-Siswa">Guru-Siswa</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="tgl_post-input" class="col-sm-2 control-label">Tanggal Posting</label>
								<div class="col-sm-10">
									<input class="form-control" name="tgl_post-input" id="tgl_post-input" placeholder="yyyy-mm-dd" type="text">
								</div>
							</div>
							<input type="hidden" name="model-input" id="model-input" value="pesan">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_pesan">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_pesan')">
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
							data: $("#form-pesan").serialize(),
							dataType: 'json',
							type: 'POST',
							cache: false,
							success: function(json) {
								loading('loading',false);
								if (json['data'].code === 1) {
									alert('Penyimpanan data berhasil');
									loadContent(base_url + 'view/_table_pesan');
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
						data: 'model-input=pesan&key-input=id_pesan&value-input=' + x,
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							if (json['data'].code === 1) {
								$("#id_pesan-input").val(json.data.object.id_pesan).attr("readonly","");
								$("#judul-input").val(json.data.object.judul);
								$("#isi-input").val(json.data.object.isi);
								$("#dari-input").val(json.data.object.dari);
								$("#ke-input").val(json.data.object.ke);
								$("#type_pesan-input").val(json.data.object.type_pesan);
								$("#tgl_post-input").val(json.data.object.tgl_post);
								$("#action-input").val("2");
								$("#value-input").val(x);
							}
						}
					});
				}
			</script>