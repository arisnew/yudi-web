<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Jadwal Guru</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
			<table id="tabel-jadwal" class="table table-bordered">
				<thead>
					<tr>
						<th>Mata Pelajaran</th>
						<th>Nama Kelas</th>
						<th>Nama Jurusan</th>
						<th>Hari</th>
						<th>Jam</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function () {
		getData();
	});

	function getData() {
		if ($.fn.dataTable.isDataTable('#tabel-jadwal')) {
			table = $('#tabel-jadwal').DataTable();
		} else {
			table = $('#tabel-jadwal').DataTable({
				"ajax": base_url + 'objects/jadwal/nip/<?php echo $this->session->userdata('_ID');?>',
				"columns": [
				{"data": "nama_mapel"},
				{"data": "nama_kelas"},
				{"data": "nama_jurusan"},
				{"data": "hari"},
				{"data": "jam"},
				{"data": "aksi"}
				],
				"ordering": true,
				"deferRender": true,
				"order": [[0, "asc"]],
				"fnDrawCallback": function (oSettings) {
					utils();
				}
			});
		}
	}

	function utils() {

		$("#tabel-jadwal .editBtn").hide();

		$("#tabel-jadwal .readBtn").on("click",function(){
			loadContent(base_url + 'view/_form_materi_guru/' + $(this).attr('href').substring(1));
		});

		$("#tabel-jadwal .removeBtn").hide();
	}

	function konfirmasiHapus(x){
		if(confirm("Yakin hapus Data???")){
			loading('loading', true);
			setTimeout(function() {
				$.ajax({
					url: base_url + 'manage',
					data: 'model-input=jadwal&key-input=id_jadwal&action-input=3&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						loading('loading',false);
						if (json['data'].code === 1) {
							alert('Hapus data berhasil');
							loadContent(base_url + "view/_table_jadwal_guru");
						} else if(json['data'].code === 2){
							alert('Hapus data tidak berhasil!');
						} else{
							alert(json['data'].message);
						}
					},
					error: function () {
						loading('loading',false);
						alert('Hapus data tidak berhasil, terjadi kesalahan!');
					}
				});
			}, 1000);
		}
	}
</script>
