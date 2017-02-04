<?php
$data_siswa = $this->model->getList(array('table' => 'siswa', 'where' => array('status' => 'Aktif')));
$data_mata_pelajaran = $this->model->getList(array('table' => 'mata_pelajaran', 'where' => array('status' => 'Aktif')));
?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Nilai Ujian</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div id="loading"></div>
						<form id="form-nilai_ujian" class="form-horizontal">
							<div class="form-group">
								<label for="siswa-input" class="col-sm-2 control-label">NIS</label>
								<div class="col-sm-10">
									<select class="form-control" name="siswa-input" id="siswa-input">
										<?php
										if ($data_siswa) {
											foreach ($data_siswa as $row) {
												echo '<option value="' . $row->nis . '">' . $row->nis . ' - ' . $row->nama . '</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="jumlah_benar-input" class="col-sm-2 control-label">Jumlah Benar</label>
								<div class="col-sm-10">
									<input class="form-control" name="jumlah_benar-input" id="jumlah_benar-input" placeholder="Jumlah Benar" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="jumlah_salah-input" class="col-sm-2 control-label">Jumlah Salah</label>
								<div class="col-sm-10">
									<input class="form-control" name="jumlah_salah-input" id="jumlah_salah-input" placeholder="Jumlah Salah" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="tgl_ujian-input" class="col-sm-2 control-label">Tanggal Ujian</label>
								<div class="col-sm-10">
									<input class="form-control datepicker2" name="tgl_ujian-input" id="tgl_ujian-input" placeholder="yyyy-mm-dd" type="text">
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
								<label for="nilai-input" class="col-sm-2 control-label">Nilai</label>
								<div class="col-sm-10">
									<input class="form-control" name="nilai-input" id="nilai-input" placeholder="Nilai" type="text">
								</div>
							</div>
							<input type="hidden" name="model-input" id="model-input" value="nilai_ujian">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_nilai">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_nilai_ujian')">
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

					$(".datepicker2").datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function(e){
						$(this).datepicker('hide');
					});					
				});

				function simpan_data() {
					loading('loading', true);
					setTimeout(function() {
						$.ajax({
							url: base_url + 'manage',
							data: $("#form-nilai_ujian").serialize(),
							dataType: 'json',
							type: 'POST',
							cache: false,
							success: function(json) {
								loading('loading',false);
								if (json['data'].code === 1) {
									alert('Penyimpanan data berhasil');
									loadContent(base_url + 'view/_table_nilai_ujian');
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
						data: 'model-input=nilai_ujian&key-input=id_nilai&value-input=' + x,
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							if (json['data'].code === 1) {
								$("#id_nilai-input").val(json.data.object.id_nilai).attr("readonly","");
								$("#nis-input").val(json.data.object.nis);
								$("#jumlah_benar-input").val(json.data.object.jumlah_benar);
								$("#jumlah_salah-input").val(json.data.object.jumlah_salah);
								$("#tgl_ujian-input").val(json.data.object.tgl_ujian);
								$("#kode_mapel-input").val(json.data.object.kode_mapel);
								$("#nilai-input").val(json.data.object.nilai);
								$("#action-input").val("2");
								$("#value-input").val(x);
							}
						}
					});
				}
			</script>