<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form USER</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
			<table id="tabel-user" class="table table-bordered">
				<thead>
					<tr>
						<th>Username</th>
						<th>Nama</th>
						<th>Email</th>
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
        if ($.fn.dataTable.isDataTable('#tabel-user')) {
            table = $('#tabel-user').DataTable();
        } else {
            table = $('#tabel-user').DataTable({
                "ajax": base_url + 'objects/user',
                "columns": [
	                {"data": "username"},
	                {"data": "nama"},
	                {"data": "email"},
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
        $("#tabel-user .editBtn").on("click",function(){
            loadContent(base_url + 'view/_user_form/' + $(this).attr('href').substring(1));
        });

        $("#tabel-user .removeBtn").on("click",function(){
            //konfirmasiHapus($(this).attr('href').substring(1));
        });
    }
</script>