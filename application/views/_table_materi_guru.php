<?php
$data_mata_pelajaran = $this->model->getList(array('table' => 'v_jadwal', 'where' => array('status' => 'Aktif','nip' => $this->session->userdata('_ID'))));
?>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> Tabel Materi</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="loading"></div>
                <div class="form-group">
                    <label for="mata_pelajaran-input" class="col-sm-2 control-label">Mata Pelajaran</label>
                    <div class="col-sm-5">
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
                </div>
            <table id="tabel-materi" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Judul Materi</th>
                        <th>Tanggal Posting</th>
                        <th>Publish</th>
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
        //isi datatables materi
        getData();

        //jika dropdown mata_pelajaran atau mapel di ganti maka akan me-lookup materi
        $("#mata_pelajaran-input").on('change', function () {
            refreshTable();
        });

    });

    //isi datatables materi
    function getData() {
        if ($.fn.dataTable.isDataTable('#tabel-materi')) {
            table = $('#tabel-materi').DataTable();
        } else {
            table = $('#tabel-materi').DataTable({
                "ajax": base_url + 'objects/materi/nip__id_jadwal/<?php echo $this->session->userdata('_ID');?>' + '__' + $("#mata_pelajaran-input").val(),
                "columns": [
                {"data": "nama_mapel"},
                {"data": "judul"},
                {"data": "tgl_posting"},
                {"data": "publish"},
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

    //ketika tombol diklik di datatables
    function utils() {
        $("#tabel-materi .editBtn").on("click",function(){
            loadContent(base_url + 'view/_form_materi_guru/x__' + $(this).attr('href').substring(1));
        });

        $("#tabel-materi .writeBtn").on("click",function(){
            loadContent(base_url + 'view/_form_soal_guru/' + $(this).attr('href').substring(1));
        });

        $("#tabel-materi .readBtn").on("click",function(){
            loadContent(base_url + 'view/_view_materi_guru/' + $(this).attr('href').substring(1));
        });

        $("#tabel-materi .removeBtn").on("click",function(){
            konfirmasiHapus($(this).attr('href').substring(1));
        });
    }

    //konfirmasi hapus
    function konfirmasiHapus(x){
        if(confirm("Yakin Hapus Data???")){
            loading('loading', true);
            setTimeout(function() {
                $.ajax({
                    url: base_url + 'manage',
                    data: 'model-input=materi&key-input=id_materi&action-input=3&value-input=' + x,
                    dataType: 'json',
                    type: 'POST',
                    cache: false,
                    success: function(json) {
                        loading('loading',false);
                        if (json['data'].code === 1) {
                            alert('Hapus Data Berhasil');
                            loadContent(base_url + "view/_table_materi_guru");
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

    //reload url ajax datatables
    function refreshTable() {
        table.ajax.url(base_url + 'objects/materi/nip__id_jadwal/<?php echo $this->session->userdata('_ID');?>' + '__' + $("#mata_pelajaran-input").val()).load();
    }
</script>
