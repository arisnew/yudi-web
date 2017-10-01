<?php
$data_guru = $this->model->getList(array('table' => 'guru', 'where' => array('status' => 'Aktif')));
?>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tabel Jadwal</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            <div class="box-body">
                <div id="loading"></div>
                <div class="form-group">
                    <label for="guru-input" class="col-sm-2 control-label">Guru</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="guru-input" id="guru-input">
                            <?php
                            if ($data_guru) {
                                foreach ($data_guru as $row) {
                                    echo '<option value="' . $row->nip . '">' . $row->nama . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <a href="#" onclick="loadContent(base_url + 'view/_form_jadwal');" class="btn btn-success pull-right">Tambah Data Jadwal</a>
                <table id="tabel-jadwal" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Jurusan</th>
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
        getData();

        $("#guru").on("change", function () {
            refreshTable();
        });

            //jika dropdown guru atau mapel di ganti maka akan me-lookup materi
            $("#guru-input").on('change', function () {
                getMata_Pelajaran($("#guru-input").val());
                setTimeout(function () {
                    refreshTable();
                }, 1000);
            });

            $("#guru-input").on('change', function () {
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
                $("#mata_pelajaran-input").html(html);
            }
        });
    }

    function getData() {
        if ($.fn.dataTable.isDataTable('#tabel-jadwal')) {
          table = $('#tabel-jadwal').DataTable();
      } else {
          table = $('#tabel-jadwal').DataTable({
            "ajax": base_url + 'objects/jadwal',
            "columns": [
            {"data": "nama"},
            {"data": "nama_mapel"},
            {"data": "nama_kelas"},
            {"data": "hari"},
            {"data": "jam"},
            {"data": "nama_jurusan"},
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
    $("#tabel-jadwal .readBtn").on("click",function(){
      loadContent(base_url + 'view/_form_materi_admin/' + $(this).attr('href').substring(1));
  });

    $("#tabel-jadwal .editBtn").on("click",function(){
      loadContent(base_url + 'view/_form_jadwal/' + $(this).attr('href').substring(1));
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
    table.ajax.url(base_url + 'objects/jadwal/nip/' + $("#guru-input").val()).load();
}
</script>
