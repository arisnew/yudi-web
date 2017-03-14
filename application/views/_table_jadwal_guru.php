<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">List Jadwal</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div id="loading"></div>
          <a href="#" onclick="loadContent(base_url + 'view/_jadwal_form');" class="btn btn-success pull-right"> Add Jadwal</a>
          <table id="tabel-jadwal" class="table table-bordered">
            <thead>
              <tr>
                <th>Kode Mata Pelajaran</th>
                <th>NIP</th>
                <th>Nama Kelas</th>
                <th>Nama Jurusan</th>
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
        if ($.fn.dataTable.isDataTable('#tabel-jadwal')) {
          table = $('#tabel-jadwal').DataTable();
        } else {
          table = $('#tabel-jadwal').DataTable({
            "ajax": base_url + 'objects/jadwal/nip/<?php echo $this->session->userdata('_ID');?>',
            "columns": [
            {"data": "kode_mapel"},
            {"data": "nip"},
            {"data": "nama_kelas"},
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
        $("#tabel-jadwal .editBtn").on("click",function(){
          loadContent(base_url + 'view/_jadwal_form/' + $(this).attr('href').substring(1));
        });

        $("#tabel-jadwal .removeBtn").on("click",function(){
          konfirmasiHapus($(this).attr('href').substring(1));
        });
      }

      function konfirmasiHapus(x){
        if(confirm("Yakin hapus Data???")){
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
                  alert('Hapus data berhasil');
                  loadContent(base_url + "view/_table_jadwal");
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
