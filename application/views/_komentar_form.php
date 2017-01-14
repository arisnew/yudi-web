<section class="content">
	<div class="box">
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
					<form id="form-komentar">
						<label>Komentator :</label>
						<input class="form-control" type="text" name="komentator-input" id="komentator-input" value="">
						<br>
						<label>Level Komentator :</label>
						<select class="form-control" name="level_komentator-input" id="level_komentator-input">
							<option value="Siswa">Siswa</option>
							<option value="Guru">Guru</option>
						</select>
						<br>
						<label>Isi :</label>
						<input class="form-control" type="text" name="isi-input" id="isi-input" value="">
						<br>
						<label>Tanggal Posting :</label>
						<input class="form-control" type="text" name="tgl_post-input" id="tgl_post-input" value="" placeholder="yyyy-mm-dd">
						<br>
						<input type="hidden" name="model-input" id="model-input" value="komentar">
						<input type="hidden" name="action-input" id="action-input" value="1">
						<input type="hidden" name="key-input" id="key-input" value="id_komentar">
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