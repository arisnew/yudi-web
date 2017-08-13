<?php 
$jadwal = $this->model->getList(array('table' => 'v_materi', 'where' => array('nis' => $this->session->userdata('_ID'), 'status' => 'Aktif')));
?>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">List Soal</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>                      
        <div class="box-body">
            <div id="loading"></div>
            <label>Pilihan Mata Pelajaran</label>
            <select id="jadwal">
                <?php
                if ($jadwal) {
                    foreach ($jadwal as $row) {
                        echo "<option value='".$row->id_jadwal."'>".$row->nama_mapel."</option>";
                    }
                }
                ?>
            </select>
            <table id="tabel-soal" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Nama Guru</th>
                        <th>Tanggal Posting</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="box-footer">Footer</div>
    </div>
</section>
<script type="text/javascript">
 $(document).ready(function () {
  getData();

  //on change jadwal
  $("#jadwal").on("change", function () {
    refreshTable();
});
});

 function getData() {
    if ($.fn.dataTable.isDataTable('#tabel-soal')) {
        table = $('#tabel-soal').DataTable();
    } else {
        table = $('#tabel-soal').DataTable({
            "ajax": base_url + 'objects/soal/id_jadwal/' + $('#jadwal').val(),
            "columns": [
            {"data": "nama_mapel"},
            {"data": "nama"},
            {"data": "tgl_posting"}
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

    $("#tabel-soal .warningBtn").on("click",function(){
        loadContent(base_url + 'view/_view_soal_siswa/' + $(this).attr('href').substring(1));
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
    table.ajax.url(base_url + 'objects/soal/id_jadwal/' + $('#jadwal').val()).load();
}
</script>