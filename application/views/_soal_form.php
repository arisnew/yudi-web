<?php
$data_mata_pelajaran = $this->model->getList(array('table' => 'mata_pelajaran', 'where' => array('status' => 'Aktif')));
$data_guru = $this->model->getList(array('table' => 'guru', 'where' => array('status' => 'Aktif')));
?>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Soal</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="loading"></div>
					<form id="form-soal">
						<br>
						<label>Pertanyaan :</label>
						<input class="form-control" type="text" name="pertanyaan-input" id="pertanyaan-input" value="">
						<br>
						<label>Pilihan A :</label>
						<input class="form-control" type="text" name="opsi_a-input" id="opsi_a-input" value="">
						<br>
						<label>Pilihan B :</label>
						<input class="form-control" type="text" name="opsi_b-input" id="opsi_b-input" value="">
						<br>
						<label>Pilihan C :</label>
						<input class="form-control" type="text" name="opsi_c-input" id="opsi_c-input" value="">
						<br>
						<label>Pilihan D :</label>
						<input class="form-control" type="text" name="opsi_d-input" id="opsi_d-input" value="">
						<br>
						<label>Jawaban :</label>
						<input class="form-control" type="text" name="jawaban-input" id="jawaban-input" value="">
						<br>
						<label>Kode Mata Pelajaran :</label>
						<select class="form-control" name="mata_pelajaran-input" id="mata_pelajaran-input">
							<?php
							if ($data_mata_pelajaran) {
								foreach ($data_mata_pelajaran as $row) {
									echo '<option value="' . $row->kode_mapel . '">' . $row->kode_mapel . ' - ' . $row->nama_mapel . '</option>';
								}
							}
							?>
						</select>
						<br>
						<label>NIP :</label>
						<select class="form-control" name="nip-input" id="nip-input">
							<?php
							if ($data_guru) {
								foreach ($data_guru as $row) {
									echo '<option value="' . $row->nip . '">' . $row->nip . ' - ' . $row->nama . '</option>';
								}
							}
							?>
						</select>
						<br>
						<label>Tanggal Posting :</label>
						<input class="form-control" type="text" name="tgl_posting-input" id="tgl_posting-input" value="" placeholder="yyyy-mm-dd">
						<br>
						<input type="hidden" name="model-input" id="model-input" value="soal">
						<input type="hidden" name="action-input" id="action-input" value="1">
						<input type="hidden" name="key-input" id="key-input" value="id_soal">
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
						data: $("#form-soal").serialize(),
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							loading('loading',false);
							if (json['data'].code === 1) {
								alert('Penyimpanan data berhasil');
								loadContent(base_url + 'view/_table_soal');
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
					data: 'model-input=soal&key-input=id_soal&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#id_soal-input").val(json.data.object.id_soal).attr("readonly","");
							$("#pertanyaan-input").val(json.data.object.pertanyaan);
							$("#opsi_a-input").val(json.data.object.opsi_a);
							$("#opsi_b-input").val(json.data.object.opsi_b);
							$("#opsi_c-input").val(json.data.object.opsi_c);
							$("#opsi_d-input").val(json.data.object.opsi_d);
							$("#jawaban-input").val(json.data.object.jawaban);
							$("#kode_mapel-input").val(json.data.object.kode_mapel);
							$("#nip-input").val(json.data.object.nip);
							$("#tgl_posting-input").val(json.data.object.tgl_posting);
							$("#action-input").val("2");
							$("#value-input").val(x);
						}
					}
				});
			}
		</script>