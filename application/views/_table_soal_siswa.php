<?php
$data_guru = $this->model->getList(array('table' => 'guru', 'where' => array('status' => 'Aktif')));
?>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tabel soal</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
            <div class="box-body">
                <div id="loading"></div>
                <div class="form-group">
                    <label for="guru-input" class="col-sm-2 control-label">Guru</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="guru-input" id="guru-input">
                            <option></option>
                            <?php
                            if ($data_guru) {
                                foreach ($data_guru as $row) {
                                    echo '<option value="' . $row->nip . '">' . $row->nama . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <label for="mata_pelajaran-input" class="col-sm-2 control-label">Mata Pelajaran</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="mata_pelajaran-input" id="mata_pelajaran-input">
                        </select>
                    </div>
                </div>
                <table id="tabel-soal" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Guru</th>
                            <th>Materi</th>
                            <th>Tanggal Posting</th>
                            <th>Durasi</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        getData();

        //jika dropdown guru atau mapel di ganti maka akan me-lookup soal
        $("#guru-input").on('change', function () {
            getMata_Pelajaran($("#guru-input").val());
            setTimeout(function () {
                refreshTable();
            }, 500);
        });

        $("#mata_pelajaran-input").on('change', function () {
            refreshTable();
        });

    });

    function getMata_Pelajaran(nip) {
        $.ajax({
            url: base_url + 'retriever/get_mapel_by_guru/' + nip,
            data: 'id=0',
            dataType: 'html',
            type: 'POST',
            cache: false,
            success: function(html) {
                $("#mata_pelajaran-input").html(html).trigger("change");
            }
        });
    }

    function getData() {
        if ($.fn.dataTable.isDataTable('#tabel-soal')) {
            table = $('#tabel-soal').DataTable();
        } else {
            table = $('#tabel-soal').DataTable({
                "ajax": base_url + 'objects/soal/nip__kode_mapel/' + $("#guru-input").val() + '__' + $("#mata_pelajaran-input").val(),
                "columns": [
                {"data": "nama"},
                {"data": "judul"},
                {"data": "tgl_posting"},
                {"data": "durasi"},
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

        $("#tabel-soal .readBtn").on("click",function(){
            loadContent(base_url + 'view/_view_soal/' + $(this).attr('href').substring(1));
        });

        $("#tabel-soal .editBtn").hide();
        $("#tabel-soal .removeBtn").hide();
        $("#tabel-soal .writeBtn").hide();


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
                            loadContent(base_url + "view/_table_soal_siswa");
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
        table.ajax.url(base_url + 'objects/soal/nip/' + $("#guru-input").val()).load();
    }
</script>

