<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List materi</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="loading"></div>
                    <a href="#" onclick="loadContent(base_url + 'view/_lampiran_form');" class="btn btn-success pull-right"> Add Lampiran</a>
                    <table id="tabel-lampiran" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Nama Lampiran</th>
                                <th>Nama File</th>
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
                if ($.fn.dataTable.isDataTable('#tabel-lampiran')) {
                    table = $('#tabel-lampiran').DataTable();
                } else {
                    table = $('#tabel-lampiran').DataTable({
                        "ajax": base_url + 'objects/lampiran',
                        "columns": [
                        {"data": "judul"},
                        {"data": "nama_lampiran"},
                        {"data": "nama_file"},
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
                $("#tabel-lampiran .editBtn").on("click",function(){
                    loadContent(base_url + 'view/_lampiran_form/' + $(this).attr('href').substring(1));
                });

                $("#tabel-lampiran .removeBtn").on("click",function(){
                    konfirmasiHapus($(this).attr('href').substring(1));
                });
            }

            function konfirmasiHapus(x){
                if(confirm("Yakin hapus Data???")){
                    loading('loading', true);
                    setTimeout(function() {
                        $.ajax({
                            url: base_url + 'manage',
                            data: 'model-input=lampiran&key-input=id_lampiran&action-input=3&value-input=' + x,
                            dataType: 'json',
                            type: 'POST',
                            cache: false,
                            success: function(json) {
                                loading('loading',false);
                                if (json['data'].code === 1) {
                                    alert('Hapus data berhasil');
                                    loadContent(base_url + "view/_table_lampiran");
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