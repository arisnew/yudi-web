<?php
//get data siswa (current session) 1 row
$me = $this->model->getRecord(array('table' => 'siswa', 'where' => array('nis' => $this->session->userdata('_ID'))));
$jadwal = $this->model->getList(array('table' => 'v_jadwal', 'where' => array('status' => 'Aktif', 'kode_kelas' => $me->kelas, 'kode_jurusan' => $me->jurusan)));
$kelas = $me->kelas;
$jurusan = $me->jurusan;
?>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List Materi Siswa</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="loading"></div>
            <div class="form-group">
            <label for="pilih-jadwal" class="col-sm-2 control-label">Mata Pelajaran</label>
                <div class="col-sm-5">
                    <select class="form-control" name="pilih-jadwal" id="pilih-jadwal">
                        <?php
                        if ($jadwal) {
                            foreach ($jadwal as $row) {
                                echo '<option value="' . $row->kode_mapel . '">' . $row->nama_mapel . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- <a href="#" onclick="loadContent(base_url + 'view/_materi_form');" class="btn btn-success pull-right">Tambah Data Materi</a> -->
            <table id="tabel-materi" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mata Pelajran</th>
                        <th>Judul</th>
                        <th>Guru</th>
                        <th>Tanggal Posting</th>
                        <th>Publish</th>
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
        refresh_table();

        $("#pilih-jadwal").on("change", function () {
            refresh_table();
        });
    });

    function getData() {
        if ($.fn.dataTable.isDataTable('#tabel-materi')) {
            table = $('#tabel-materi').DataTable();
        } else {
            table = $('#tabel-materi').DataTable({
                "ajax": base_url + 'objects/materi/kode_mapel/<?php echo $this->session->userdata('_ID');?>' + $("#pilih-jadwal").val(),
                "columns": [
                {"data": "nama_mapel"},
                {"data": "judul"},
                {"data": "nama"},
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

    function utils() {

        $("#tabel-materi .readBtn").on("click",function(){
            loadContent(base_url + 'view/_view_materi_siswa/' + $(this).attr('href').substring(1));
        });

        $("#tabel-materi .editBtn").hide();
        $("#tabel-materi .removeBtn").hide();
        $("#tabel-materi .writeBtn").hide();


    }

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
                            loadContent(base_url + "view/_table_materi");
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

    function refresh_table(){
        table.ajax.url(base_url + 'objects/materi/kode_mapel/' + $("#pilih-jadwal").val()).load();
    }
</script>
