<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Tabel Jurusan </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="loading"></div>
            <a href="#" onclick="loadContent(base_url + 'view/_form_jurusan');" class="btn btn-success pull-right">Tambah Data Jurusan</a>
            <table id="tabel-jurusan" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th>Status</th>
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
        if ($.fn.dataTable.isDataTable('#tabel-jurusan')) {
            table = $('#tabel-jurusan').DataTable();
        } else {
            table = $('#tabel-jurusan').DataTable({
                "ajax": base_url + 'objects/jurusan',
                "columns": [
                {"data": "kode_jurusan"},
                {"data": "nama_jurusan"},
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
        $("#tabel-jurusan .editBtn").on("click",function(){
            loadContent(base_url + 'view/_form_jurusan/' + $(this).attr('href').substring(1));
        });

        $("#tabel-jurusan .removeBtn").on("click",function(){
            konfirmasiHapus($(this).attr('href').substring(1));
        });
    }

    function konfirmasiHapus(x){
        if(confirm("Yakin Hapus Data???")){
            loading('loading', true);
            setTimeout(function() {
                $.ajax({
                    url: base_url + 'manage',
                    data: 'model-input=jurusan&key-input=kode_jurusan&action-input=3&value-input=' + x,
                    dataType: 'json',
                    type: 'POST',
                    cache: false,
                    success: function(json) {
                        loading('loading',false);
                        if (json['data'].code === 1) {
                            alert('Hapus Data Berhasil');
                            loadContent(base_url + "view/_table_jurusan");
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