    <section class="content">
    	<div class="box">
    		<div class="box-header with-border">
    			<h3 class="box-title">List Soal</h3>
    			<div class="box-tools pull-right">
    				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                   <div id="loading"></div>
                   <table id="tabel-soal" class="table table-bordered">
                      <thead>
                         <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Tanggal Posting</th>
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
          if ($.fn.dataTable.isDataTable('#tabel-soal')) {
            table = $('#tabel-soal').DataTable();
        } else {
            table = $('#tabel-soal').DataTable({
              "ajax": base_url + 'objects/soal/nip/<?php echo $this->session->userdata('_ID');?>',
              "columns": [
              {"data": "pertanyaan"},
              {"data": "jawaban"},
              {"data": "tgl_posting"},
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
</script>