<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Mata Pelajaran</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
            <a href="#" onclick="loadContent(base_url + 'view/_matapelajaran_form');" class="btn btn-success pull-right"> Add Mata Pelajaran</a>
			<table id="tabel-matapelajaran" class="table table-bordered">
				<thead>
					<tr>
						<th>Kode Mata Pelajaran</th>
						<th>Nama Mata Pelajaran</th>
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
        if ($.fn.dataTable.isDataTable('#tabel-matapelajaran')) {
            table = $('#tabel-matapelajaran').DataTable();
        } else {
            table = $('#tabel-matapelajaran').DataTable({
                "ajax": base_url + 'objects/mata_pelajaran',
                "columns": [
	                {"data": "kode_mapel"},
	                {"data": "nama_mapel"},
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
        $("#tabel-matapelajaran .editBtn").on("click",function(){
            loadContent(base_url + 'view/_matapelajaran_form/' + $(this).attr('href').substring(1));
        });

        $("#tabel-matapelajaran .removeBtn").on("click",function(){
            konfirmasiHapus($(this).attr('href').substring(1));
        });
    }

    function konfirmasiHapus(x){
    	if(confirm("Yakin hapus Data???")){
            loading('loading', true);
            setTimeout(function() {
                $.ajax({
                    url: base_url + 'manage',
                    data: 'model-input=mata_pelajaran&key-input=kode_mapel&action-input=3&value-input=' + x,
                    dataType: 'json',
                    type: 'POST',
                    cache: false,
                    success: function(json) {
                        loading('loading',false);
                        if (json['data'].code === 1) {
                            alert('Hapus data berhasil');
                            loadContent(base_url + "view/_table_matapelajaran");
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