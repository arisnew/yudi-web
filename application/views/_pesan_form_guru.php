<?php
//$data_guru = $this->model->getList(array('table' => 'guru', 'where' => array('status' => 'Aktif')));
?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Pesan</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<div id="loading"></div>
				<form id="form-pesan" class="form-horizontal">
					<div class="form-group">
						<label for="publish-input" class="col-sm-2 control-label">Type Pesan</label>
						<div class="col-sm-10">								
							<select class="form-control" name="type_pesan-input" id="type_pesan-input">
								<option value="Guru-Guru">Guru-Guru</option>
								<option value="Guru-Siswa">Guru-Siswa</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="to-input" class="col-sm-2 control-label">Ke</label>
						<div class="col-sm-5">
							<div class="input-group">
					            <input type="hidden" name="to-id" id="to-id" value="">
					            <input type="text" class="form-control" id="to-input" name="to-input" placeholder="NIS"/>
					            <a href="#" id="btn-search-siswa" onclick="searchSiswa(); return false;" class="input-group-addon btn-primary" title="Cari Siswa"><span class="fa fa-search"></span></a>
					        </div>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nama-siswa-input" name="nama-siswa-input" placeholder="Nama Siswa" readonly="" required="" />
						</div>
					        
				    </div>
				    <div class="form-group">
						<label for="to-input" class="col-sm-2 control-label">Ke</label>
						<div class="col-sm-5">
							<div class="input-group">
					            <input type="hidden" name="to-guru-id" id="to-guru-id" value="">
					            <input type="text" class="form-control" id="to-guru-input" name="to-guru-input" placeholder="NIP "/>
					            <a href="#" id="btn-search-guru" onclick="searchGuru(); return false;" class="input-group-addon btn-primary" title="Cari Siswa"><span class="fa fa-search"></span></a>
					        </div>
						</div>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nama-guru-input" name="nama-guru-input" placeholder="Nama Guru" readonly="" required="" />
						</div>
					        
				    </div>
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
						<label for="tgl_post-input" class="col-sm-2 control-label">Tanggal Posting</label>
						<div class="col-sm-10">
							<input class="form-control datepicker2" name="tgl_post-input" id="tgl_post-input" placeholder="yyyy-mm-dd" type="text">
						</div>
					</div>							
					<input type="hidden" name="model-input" id="model-input" value="pesan">
					<input type="hidden" name="action-input" id="action-input" value="1">
					<input type="hidden" name="key-input" id="key-input" value="id_pesan">
					<input type="hidden" name="value-input" id="value-input" value="0">

					<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Kirim</button>
					<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_pesan_guru')">
				</form>
			</div>
			<div class="box-footer">
				Footer
			</div>
		</div>
	</section>
</div>
<div id="modalPickSiswa" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cari Siswa</h4>
			</div>
			<div class="modal-body">
				<div class='row'>
					<div class="col-md-12">
						<table id="table-siswa-picker" class="table table-bordered table-striped" cellspacing="0" >
							<thead>
								<tr>
									<th>NIS</th>
									<th>Nama Siswa</th>
									<th>Kelas</th>
									<th>Jurusan</th>
									<th>Pilih</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
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

		CKEDITOR.replace('isi-input');

		$("#to-input").on("change", function () {
            siswaDetailByCode();
        });

	});
	function simpan_data() {
		loading('loading', true);
		CKupdate();
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

	// pop-up Siswa
	function searchSiswa() {
		if ($.fn.dataTable.isDataTable('#table-siswa-picker')) {
			tableProduk = $('#table-siswa-picker').DataTable();
		} else {
			tableProduk = $('#table-siswa-picker').DataTable({
				"ajax": base_url + 'pick/siswa/status/Aktif',
				"columns": [
				{"data": "nis"},
				{"data": "nama"},
				{"data": "nama_kelas"},
				{"data": "nama_jurusan"},
				{"data": "aksi"}
				],
				"ordering": true,
				"deferRender": true,
				"order": [[0, "asc"]],
				"fnDrawCallback": function (oSettings) {
					$("#table-siswa-picker .pickBtn").on("click",function(){
						$("#to-id").val($(this).attr('href').substring(1));
						siswaDetail();
						$("#modalPickSiswa").modal('hide');
					});
				}
			});
		}

		$("#modalPickSiswa").modal();
	}

	function siswaDetail() {
		$.ajax({
			url: base_url + 'object',
			data: 'model-input=siswa&key-input=nis&value-input=' + $("#to-id").val(),
			dataType: 'json',
			type: 'POST',
			cache: false,
			success: function(json) {
				if (json.data.code === 0) {
					alert('Akses tidak sah');
				} else if (json.data.object != null) {
					$("#to-input").val(json.data.object.nis);
					$("#nama-siswa-input").val(json.data.object.nama);
					$("#subject-input").focus();
				} else {
					alert('Data siswa tidak valid!');
					$("#to-input, #to-id, #nama-siswa-input").val("");
					$("#to-input").focus();
				}
			}
		});
	}

	function siswaDetailByCode() {
		$.ajax({
			url: base_url + 'object',
			data: 'model-input=siswa&key-input=nis&value-input=' + $("#to-input").val(),
			dataType: 'json',
			type: 'POST',
			cache: false,
			success: function(json) {
				if (json.data.code === 0) {
					alert('Akses tidak sah');
				} else if (json.data.object != null) {
					$("#to-id").val(json.data.object.nis);
					$("#nama-siswa-input").val(json.data.object.nama);
					$("#subject-input").focus();
				} else {
					alert('Data siswa tidak valid!');
					$("#to-id").val("");
					$("#to-input, #nama-siswa-input").val("");
					$("#to-input").focus();
				}
			}
		});
	}
</script>