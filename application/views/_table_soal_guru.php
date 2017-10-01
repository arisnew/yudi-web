<?php
$data_mata_pelajaran = $this->model->getList(array('table' => 'v_jadwal', 'where' => array('status' => 'Aktif','nip' => $this->session->userdata('_ID'))));
?>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List Soal</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            <div class="box-body">
                <div id="loading"></div>
                <div class="form-group">
                    <label for="mata_pelajaran-input" class="col-sm-2 control-label">Mata Pelajaran</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="mata_pelajaran-input" id="mata_pelajaran-input">
                            <?php
                            if ($data_mata_pelajaran) {
                                foreach ($data_mata_pelajaran as $row) {
                                    echo '<option value="' . $row->id_jadwal . '">' . $row->nama_mapel . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <label for="materi-input" class="col-sm-2 control-label">Judul Materi</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="materi-input" id="materi-input">
                        </select>
                    </div>
                </div>
                <table id="tabel-soal" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Tanggal Posting</th>
                            <th>Materi</th>
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
    </div>
</section>
    <script type="text/javascript">
        $(document).ready(function () {
            getMateri($("#mata_pelajaran-input").val(), function () {
                getData();
            });

            $("#mata_pelajaran-input").on("change", function () {
                getMateri($("#mata_pelajaran-input").val(), function () {
                    refreshTable();
                });
            });

            $("#materi").on("change", function () {
                refreshTable();
            });

        });

        //untuk menampilkan materi pada saat jadwal di ubah
        function getMateri(id_jadwal, callback) {
            $.ajax({
                url: base_url + 'retriever/get_materi_by_jadwal/' + id_jadwal,
                data: 'id=0',
                dataType: 'html',
                type: 'POST',
                cache: false,
                success: function(html) {
                    $("#materi-input").html(html);
                    if (typeof callback == 'function') {
                        setTimeout(function () {
                            callback();
                        }, 500);
                    }
                }
            });
        }

        function getData() {
            if ($.fn.dataTable.isDataTable('#tabel-soal')) {
                table = $('#tabel-soal').DataTable();
            } else {
                table = $('#tabel-soal').DataTable({
                    "ajax": base_url + 'objects/soal/id_materi/' + $("#materi-input").val(),
                    "columns": [
                        {"data": "pertanyaan"},
                        {"data": "jawaban"},
                        {"data": "tgl_posting"},
                        {"data": "judul"},
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
            $("#tabel-soal .editBtn").on("click",function(){
                loadContent(base_url + 'view/_form_soal_guru/x__' + $(this).attr('href').substring(1));
            });

            $("#tabel-soal .readBtn").on("click",function(){
            loadContent(base_url + 'view/_view_soal_guru/' +$(this).attr('href').substring(1));
            });

            $("#tabel-soal .removeBtn").on("click",function(){
                konfirmasiHapus($(this).attr('href').substring(1));
            });
        }

        function konfirmasiHapus(x){
            if(confirm("Yakin Hapus Data???")){
                loading('loading', true);
                setTimeout(function() {
                    $.ajax({
                        url: base_url + 'manage',
                        data: 'model-input=soal&key-input=id_soal&action-input=3&value-input=' + x,
                        dataType: 'json',
                        type: 'POST',
                        cache: false,
                        success: function(json) {
                            loading('loading',false);
                            if (json['data'].code === 1) {
                                alert('Hapus Data Berhasil');
                                loadContent(base_url + "view/_table_soal_guru");
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

        function refreshTable() {
            table.ajax.url(base_url + 'objects/soal/id_materi/' + $("#materi-input").val()).load();
        }
    </script>