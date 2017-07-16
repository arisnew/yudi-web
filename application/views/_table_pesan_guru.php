<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">List Pesan Terkirim</h3>

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
			<a href="#" onclick="loadContent(base_url + 'view/_pesan_form_guru');" class="btn btn-success pull-right">Tambah Pesan</a>
			<table id="tabel-pesan" class="table table-bordered">
				<thead>
					<tr>
						<th>Type Pesan</th>
						<th>Ke</th>
						<th>Judul</th>
						<th>Tanggal Posting</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			<div class="box-header with-border">
				<h3 class="box-title">List Pesan Masuk</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>	
			<table id="tabel-pesan-masuk" class="table table-bordered">
				<thead>
					<tr>
						<th>Dari</th>
						<th>Judul</th>
						<th>Tanggal Posting</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
		<div class="box-footer">
			Footer
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function () {
		getData();
		getPesanmasuk();
	});

	function getData() {
		if ($.fn.dataTable.isDataTable('#tabel-pesan')) {
			table = $('#tabel-pesan').DataTable();
		} else {
			table = $('#tabel-pesan').DataTable({
				"ajax": base_url + 'objects/pesan/dari/<?php echo $this->session->userdata('_ID');?>',
				"columns": [
				{"data": "type_pesan"},
				{"data": "ke"},
				{"data": "judul"},
				{"data": "tgl_post"},
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

	function getPesanmasuk() {
		if ($.fn.dataTable.isDataTable('#tabel-pesan-masuk')) {
			tablemasuk = $('#tabel-pesan-masuk').DataTable();
		} else {
			tablemasuk = $('#tabel-pesan-masuk').DataTable({
				"ajax": base_url + 'objects/pesan/ke/<?php echo $this->session->userdata('_ID');?>',
				"columns": [
				{"data": "dari"},
				{"data": "judul"},
				{"data": "tgl_post"},
				{"data": "aksi"}
				],
				"ordering": true,
				"deferRender": true,
				"order": [[0, "asc"]],
				"fnDrawCallback": function (oSettings) {
					utilspesanmasuk();
				}
			});
		}
	}

	function utils() {
		$("#tabel-pesan .editBtn").on("click",function(){
			loadContent(base_url + 'view/_pesan_form_guru/' + $(this).attr('href').substring(1));
		});

		$("#tabel-pesan .removeBtn").on("click",function(){
			konfirmasiHapus($(this).attr('href').substring(1));
		});
	}

	function utilspesanmasuk() {
		$("#tabel-pesan-masuk .readBtn").on("click",function(){
            loadContent(base_url + 'view/_view_pesan_guru/' + $(this).attr('href').substring(1));
        });

		$("#tabel-pesan-masuk .removeBtn").on("click",function(){
			konfirmasiHapus($(this).attr('href').substring(1));
		});
	}


	function konfirmasiHapus(x){
		if(confirm("Yakin Hapus Data???")){
			loading('loading', true);
			setTimeout(function() {
				$.ajax({
					url: base_url + 'manage',
					data: 'model-input=pesan&key-input=id_pesan&action-input=3&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						loading('loading',false);
						if (json['data'].code === 1) {
							alert('Hapus Data Berhasil');
							loadContent(base_url + "view/_table_pesan_guru");
						} else if(json['data'].code === 2){
							alert('Hapus Data Tidak Berhasil!');
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