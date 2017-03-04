<?php
$data_mata_pelajaran = $this->model->getList(array('table' => 'mata_pelajaran', 'where' => array('status' => 'Aktif')));
$data_guru = $this->model->getList(array('table' => 'guru', 'where' => array('status' => 'Aktif')));
?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
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
						<form id="form-soal" class="form-horizontal">
							<div class="form-group">
								<label for="pertanyaan-input" class="col-sm-2 control-label">Pertanyaan</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="pertanyaan-input" id="pertanyaan-input" placeholder="Isi" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="opsi_a-input" class="col-sm-2 control-label">Pilihan A</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="opsi_a-input" id="opsi_a-input" placeholder="Opsi A" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="opsi_b-input" class="col-sm-2 control-label">Pilihan B</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="opsi_b-input" id="opsi_b-input" placeholder="Opsi B" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="opsi_c-input" class="col-sm-2 control-label">Pilihan C</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="opsi_c-input" id="opsi_c-input" placeholder="Opsi C" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="opsi_d-input" class="col-sm-2 control-label">Pilihan D</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="opsi_d-input" id="opsi_d-input" placeholder="Opsi D" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="jawaban-input" class="col-sm-2 control-label">Jawaban</label>
								<div class="col-sm-10">
									<select class="form-control" name="jawaban-input" id="jawaban-input">
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="D">D</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="mata_pelajaran-input" class="col-sm-2 control-label">Mata Pelajaran</label>
								<div class="col-sm-10">
									<select class="form-control" name="mata_pelajaran-input" id="mata_pelajaran-input">
										<?php
										if ($data_mata_pelajaran) {
											foreach ($data_mata_pelajaran as $row) {
												echo '<option value="' . $row->kode_mapel . '">' . $row->kode_mapel . ' - ' . $row->nama_mapel . '</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="guru-input" class="col-sm-2 control-label">Guru</label>
								<div class="col-sm-10">
									<select class="form-control" name="guru-input" id="guru-input">
										<?php
										if ($data_guru) {
											foreach ($data_guru as $row) {
												echo '<option value="' . $row->nip . '">' . $row->nip . ' - ' . $row->nama . '</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="tgl_posting-input" class="col-sm-2 control-label">Tanggal Posting</label>
								<div class="col-sm-10">
									<input class="form-control datepicker2" name="tgl_posting-input" id="tgl_posting-input" placeholder="yyyy-mm-dd" type="text">
								</div>
							</div>
							<input type="hidden" name="model-input" id="model-input" value="soal">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_soal">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_soal')">
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

					$(".datepicker2").datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function(e){
						$(this).datepicker('hide');
					});

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