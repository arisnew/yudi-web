<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">DATA Guru</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
            <a href="#" onclick="loadContent(base_url + 'view/_guru_form');" class="btn btn-success pull-right"> Add Guru</a>
			<table id="tabel-guru" class="table table-bordered">
				<thead>
					<tr>
						<th>Nip</th>
						<th>Nama</th>
                        <th>Alamat</th>
                        <th>Tempat lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Nomer Telepon</th>
                        <th>Email</th>
                        <th>Status pegawai</th>
                        <th>Username</th>
						<th>Status</th>
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
	});

	function getData() {
        if ($.fn.dataTable.isDataTable('#tabel-guru')) {
            table = $('#tabel-guru').DataTable();
        } else {
            table = $('#tabel-guru').DataTable({
                "ajax": base_url + 'objects/guru',
                "columns": [
	                {"data": "nip"},
	                {"data": "nama"},
                    {"data": "alamat"},
                    {"data": "tempat_lahir"},
                    {"data": "jeis_kelamin"},
                    {"data": "agama"},
                    {"data": "no_telp"},
                    {"data": "email"},
                    {"data": "status_pegawai"},
	                {"data": "username"},
	                {"data": "status"},
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
        $("#tabel-guru .editBtn").on("click",function(){
            loadContent(base_url + 'view/_guru_form/' + $(this).attr('href').substring(1));
        });

        $("#tabel-guru .removeBtn").on("click",function(){
            konfirmasiHapus($(this).attr('href').substring(1));
        });
    }

    function konfirmasiHapus(x){
    	if(confirm("Yakin hapus Data???")){
            loading('loading', true);
            setTimeout(function() {
                $.ajax({
                    url: base_url + 'manage',
                    data: 'model-input=nip&key-input=nip&action-input=3&value-input=' + x,
                    dataType: 'json',
                    type: 'POST',
                    cache: false,
                    success: function(json) {
                        loading('loading',false);
                        if (json['data'].code === 1) {
                            alert('Hapus data berhasil');
                            loadContent(base_url + "view/_table_guru");
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