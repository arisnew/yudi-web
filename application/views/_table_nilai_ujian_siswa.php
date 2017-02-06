<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List Nilai Ujian</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="loading"></div>
                    <a href="#" onclick="loadContent(base_url + 'view/_nilai_ujian_form');" class="btn btn-success pull-right">Tambah Data Nilai Ujian</a>
                    <table id="tabel-nilai_ujian" class="table table-bordered">
                        <thead>
                          <tr>            
                              <th>Nama Siswa</th>
                              <th>Jumlah Benar</th>
                              <th>Jumlah Salah</th>
                              <th>Tanggal Ujian</th>
                              <th>Mata Pelajaran</th>
                              <th>Nilai</th>
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
                if ($.fn.dataTable.isDataTable('#tabel-nilai_ujian')) {
                    table = $('#tabel-nilai_ujian').DataTable();
                } else {
                    table = $('#tabel-nilai_ujian').DataTable({
                        "ajax": base_url + 'objects/nilai_ujian/nis/<?php echo $this->session->userdata('_ID');?>',
                        "columns": [
                            {"data": "nama"},
                            {"data": "jumlah_benar"},
                            {"data": "jumlah_salah"},
                            {"data": "tgl_ujian"},
                            {"data": "nama_mapel"},
                            {"data": "nilai"},
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
                $("#tabel-nilai_ujian .editBtn").on("click",function(){
                    loadContent(base_url + 'view/_nilai_ujian_form/' + $(this).attr('href').substring(1));
                });

                $("#tabel-nilai_ujian .removeBtn").on("click",function(){
                    konfirmasiHapus($(this).attr('href').substring(1));
                });
            }

            function konfirmasiHapus(x){
                if(confirm("Yakin Hapus Data???")){
                    loading('loading', true);
                    setTimeout(function() {
                        $.ajax({
                            url: base_url + 'manage',
                            data: 'model-input=nilai_ujian&key-input=id_nilai&action-input=3&value-input=' + x,
                            dataType: 'json',
                            type: 'POST',
                            cache: false,
                            success: function(json) {
                                loading('loading',false);
                                if (json['data'].code === 1) {
                                    alert('Hapus Data Berhasil');
                                    loadContent(base_url + "view/_table_nilai_ujian");
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