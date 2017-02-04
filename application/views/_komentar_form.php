<?php
$data_materi = $this->model->getList(array('table' => 'materi', 'where' => array('status' => 'Aktif')));
?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Komentar</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div id="loading"></div>
						<form id="form-komentar" class="form-horizontal">
							<div class="form-group">
								<label for="materi-input" class="col-sm-2 control-label">Judul</label>
								<div class="col-sm-10">
									<select class="form-control" name="materi-input" id="materi-input">
										<?php
										if ($data_materi) {
											foreach ($data_materi as $row) {
												echo '<option value="' . $row->id_materi . '">' . $row->judul . '</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="komentator-input" class="col-sm-2 control-label">Komentator</label>
								<div class="col-sm-10">
									<input class="form-control" name="komentator-input" id="komentator-input" placeholder="nama" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="level_komentator-input" class="col-sm-2 control-label">level_komentator</label>
								<div class="col-sm-10">								
									<select class="form-control" name="level_komentator-input" id="level_komentator-input">
										<option value="Siswa">Siswa</option>
										<option value="Guru">Guru</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="isi-input" class="col-sm-2 control-label">Isi</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="isi-input" id="isi-input" placeholder="Isi" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="tgl_post-input" class="col-sm-2 control-label">Tanggal Posting</label>
								<div class="col-sm-10">
									<input class="form-control" name="tgl_post-input" id="tgl_post-input" placeholder="yyyy-mm-dd" type="text">
								</div>
							</div>
							<input type="hidden" name="model-input" id="model-input" value="komentar">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_komentar">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_komentar')">
						</form>
					</div>
					<div class="box-footer">
						Footer
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
						data: $("#form-komentar").serialize(),
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							loading('loading',false);
							if (json['data'].code === 1) {
								alert('Penyimpanan data berhasil');
								loadContent(base_url + 'view/_table_komentar');
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
					data: 'model-input=komentar&key-input=id_komentar&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#id_komentar-input").val(json.data.object.id_komentar).attr("readonly","");
							$("#id_materi-input").val(json.data.object.id_materi);
							$("#komentator-input").val(json.data.object.komentator);
							$("#level_komentator-input").val(json.data.object.level_komentator);
							$("#isi-input").val(json.data.object.isi);
							$("#tgl_post-input").val(json.data.object.tgl_post);
							$("#action-input").val("2");
							$("#value-input").val(x);
						}
					}
				});
			}
		</script>