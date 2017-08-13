<?php
    //get data siswa (current session) 1 row
$mapel = $this->model->getList(array('table' => 'v_jadwal', 'where' => array('status' => 'Aktif', 'kode_kelas' => $me->kelas, 'kode_jurusan' => $me->jurusan)));
$me = $this->model->getRecord(array('table' => 'siswa', 'where' => array('nis' => $this->session->userdata('_ID'))));
$kelas = $me->kelas;
$jurusan = $me->jurusan;
?>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List Jadwal Siswa</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                   <div id="loading"></div>
                   <div>
                   <label>Pilihan Mata Pelajaran</label>
                   <select id="mapel">
                    <?php
                    if ($mapel) {
                        foreach ($mapel as $row) {
                            echo "<option value='".$row->kode_mapel."'>".$row->nama_mapel."</option>";
                        }
                    }
                    ?>
                </select>
                </div>
                <!--<a href="#" onclick="loadContent(base_url + 'view/_jadwal_form');" class="btn btn-success pull-right">Tambah Data Jadwal</a> -->
                <table id="tabel-jadwal" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
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

                //on change mapel
                $("#mapel").on("change", function () {
                    refreshTable();
                });
            });

        function getData() {
            if ($.fn.dataTable.isDataTable('#tabel-jadwal')) {
                table = $('#tabel-jadwal').DataTable();
            } else {
                table = $('#tabel-jadwal').DataTable({
                    "ajax": base_url + 'objects/kode_mapel/kode_kelas__kode_jurusan__status/<?php echo $kelas . '__'.$jurusan.'__Aktif';?>' + $('#mapel').val(),

                    "columns": [
                    {"data": "nama_mapel"},
                    {"data": "nama"},
                    {"data": "nama_kelas"},
                    {"data": "hari"},
                    {"data": "jam"}
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
            $("#tabel-jadwal .editBtn").on("click",function(){
                loadContent(base_url + 'view/_jadwal_form/' + $(this).attr('href').substring(1));
            });

            $("#tabel-materi .readBtn").on("click",function(){
                loadContent(base_url + 'view/_view_jadwal_siswa/' + $(this).attr('href').substring(1));
            });

            $("#tabel-jadwal .removeBtn").on("click",function(){
                konfirmasiHapus($(this).attr('href').substring(1));
            });
        }

        function konfirmasiHapus(x){
            if(confirm("Yakin Hapus Data???")){
                loading('loading', true);
                setTimeout(function() {
                    $.ajax({
                        url: base_url + 'manage',
                        data: 'model-input=jadwal&key-input=id_jadwal&action-input=3&value-input=' + x,
                        dataType: 'json',
                        type: 'POST',
                        cache: false,
                        success: function(json) {
                            loading('loading',false);
                            if (json['data'].code === 1) {
                                alert('Hapus Data Berhasil');
                                loadContent(base_url + "view/_table_jadwal");
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
                table.ajax.url(base_url + 'objects/jadwal/kode_kelas__kode_jurusan__status/' + $('#mapel').val()).load();
            }
    </script>
