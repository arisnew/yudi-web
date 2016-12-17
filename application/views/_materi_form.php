<?php
$data_mata_pelajaran = $this->model->getList(array('table' => 'mata_pelajaran', 'where' => array('status' => 'Aktif')));
$data_guru = $this->model->getList(array('table' => 'guru', 'where' => array('status' => 'Aktif')));
?>

<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Materi</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="loading"></div>
					<form id="form-materi">
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
							<div class="form-group">
								<label for="judul-input" class="col-sm-2 control-label">Judul</label>
								<div class="col-sm-10">
									<input class="form-control" name="judul-input" id="judul-input" placeholder="Judul" type="text">
								</div>
							</div>
							<label>Isi :</label>
							<input class="form-control" type="text" name="isi-input" id="isi-input" value="">
							<br>
						</select><label>Nip :</label>
						<select class="form-control" name="guru-input" id="guru-input">
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
							<label>Publish :</label>
							<select class="form-control" name="publish-input" id="publish-input">
								<option value="Ya">Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
							<br>
							<input type="hidden" name="model-input" id="model-input" value="materi">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_materi">
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
							data: $("#form-materi").serialize(),
							dataType: 'json',
							type: 'POST',
							cache: false,
							success: function(json) {
								loading('loading',false);
								if (json['data'].code === 1) {
									alert('Penyimpanan data berhasil');
									loadContent(base_url + 'view/_table_materi');
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
						data: 'model-input=materi&key-input=id_materi&value-input=' + x,
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							if (json['data'].code === 1) {
								$("#id_materi-input").val(json.data.object.id_materi).attr("readonly","");
								$("#kode_mapel-input").val(json.data.object.kode_mapel);
								$("#judul-input").val(json.data.object.judul);
								$("#isi-input").val(json.data.object.isi);
								$("#nip-input").val(json.data.object.nip);
								$("#tgl-posting-input").val(json.data.object.tgl_posting);
								$("#publish-input").val(json.data.object.publish);
								$("#action-input").val("2");
								$("#value-input").val(x);
							}
						}
					});
				}
			</script>