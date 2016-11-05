<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Data Guru</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
			<table id="tabel-guru" class="table table-bordered">
				<thead>
					<tr>
						<th>ID Guru</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Mata Pelajaran</th>
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
	                {"data": "id"},
	                {"data": "nama"},
	                {"data": "email"},
	                {"data": "mapel"},
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
            //loadContent(base_url + 'view/_user_form/' + $(this).attr('href').substring(1));
        });

        $("#tabel-guru .removeBtn").on("click",function(){
            //konfirmasiHapus($(this).attr('href').substring(1));
        });
    }
</script>