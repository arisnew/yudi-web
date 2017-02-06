<?php
$data_mata_pelajaran = $this->model->getList(array('table' => 'mata_pelajaran', 'where' => array('status' => 'Aktif')));
$data_guru = $this->model->getList(array('table' => 'guru', 'where' => array('status' => 'Aktif')));
$data_kelas = $this->model->getList(array('table' => 'kelas', 'where' => array('status' => 'Aktif')));
$data_jurusan = $this->model->getList(array('table' => 'jurusan', 'where' => array('status' => 'Aktif')));
?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Jadwal</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box box-body">
						<div id="loading"></div>
						<form id="form-jadwal" class="form-horizontal">
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
								<label for="kelas-input" class="col-sm-2 control-label">Kelas</label>
								<div class="col-sm-10">
									<select class="form-control" name="kelas-input" id="kelas-input">
										<?php
										if ($data_kelas) {
											foreach ($data_kelas as $row) {
												echo '<option value="' . $row->kode_kelas . '">' . $row->nama_kelas . '</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="jurusan-input" class="col-sm-2 control-label">Jurusan</label>
								<div class="col-sm-10">
									<select class="form-control" name="jurusan-input" id="jurusan-input">								<?php
										if ($data_kelas) {
											foreach ($data_jurusan as $row) {
												echo '<option value="' . $row->kode_jurusan . '">' . $row->nama_jurusan . '</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="hari-input" class="col-sm-2 control-label">Hari</label>
								<div class="col-sm-10">
									<select class="form-control" name="hari-input" id="hari-input">
										<option value="1">Senin</option>
										<option value="2">Selasa</option>
										<option value="3">Rabu</option>
										<option value="4">Kamis</option>
										<option value="5">Sabtu</option>
										<option value="6">Minggu</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="jam-input" class="col-sm-2 control-label">Jam</label>
								<div class="col-sm-10">
									<select class="form-control" name="jam-input" id="jam-input">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
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
							<input type="hidden" name="model-input" id="model-input" value="jadwal">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_jadwal">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_jadwal')">
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
							data: $("#form-jadwal").serialize(),
							dataType: 'json',
							type: 'POST',
							cache: false,
							success: function(json) {
								loading('loading',false);
								if (json['data'].code === 1) {
									alert('Penyimpanan data berhasil');
									loadContent(base_url + 'view/_table_jadwal');
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
						data: 'model-input=jadwal&key-input=id_jadwal&value-input=' + x,
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							if (json['data'].code === 1) {
								$("#id_jadwal-input").val(json.data.object.id_jadwal).attr("readonly","");
								$("#kode_mapel-input").val(json.data.object.kode_mapel);
								$("#nip-input").val(json.data.object.nip);
								$("#kode_kelas-input").val(json.data.object.kode_kelas);
								$("#kode_jurusan-input").val(json.data.object.kode_jurusan);
								$("#hari-input").val(json.data.object.hari);
								$("#jam-input").val(json.data.object.jam);
								$("#status-input").val(json.data.object.status);
								$("#action-input").val("2");
								$("#value-input").val(x);
							}
						}
					});
				}
			</script>