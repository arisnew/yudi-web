<?php
$edit = false;
$id_materi = 0;
if ($param) {
    $params = explode("__", $param);
    if (count($params) == 2) {
        //maka edit
        $edit = true;
        $id_soal = $params[1];
        $soal = $this->model->getRecord(array('table' => 'v_soal', 'where' => array('id_soal' => $id_soal)));
        if ($soal) {
            $id_materi = $soal->id_materi;
        }
    } else {
        //maka insert
        $id_materi = $param;
    }
    
    $materi = $this->model->getRecord(array('table' => 'v_materi', 'where' => array('id_materi' => $id_materi)));
    if ($materi) {

        ?>
        <div class="form-group">
            <section class="content">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Soal</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="loading"></div>
                        <form id="form-soal" class="form-horizontal">
                            <div class="form-group">
                                <label for="mata_pelajaran-input" class="col-sm-2 control-label">Judul Materi</label>
                                <div class="col-sm-10">
                                    <input type =" text" value="<?php echo $materi->judul;?>" class="form-control" name="mata_pelajaran-input" id="mata_pelajaran-input" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="judul-input" class="col-sm-2 control-label">jumlah pertanyaan</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="jumlah_pertanyaan-input" id="jumlah_pertanyaan-input" placeholder="jumlah pertanyaan" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tgl_posting-input" class="col-sm-2 control-label">Tanggal Posting</label>
                                <div class="col-sm-10">
                                  <input class="form-control datepicker2" name="tgl_posting-input" id="tgl_posting-input" placeholder="yyyy-mm-dd" type="text">
                              </div>
                          </div>
                            <div class="form-group">
                                <label for="durasi-input" class="col-sm-2 control-label">Durasi</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="durasi-input" id="durasi-input" placeholder="Durasi" type="text">
                                </div>
                            </div>
                          <input type="hidden" name="model-input" id="model-input" value="soal">
                          <input type="hidden" name="action-input" id="action-input" value="1">
                          <input type="hidden" name="key-input" id="key-input" value="id_soal">
                          <input type="hidden" name="value-input" id="value-input" value="0">

                          <button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
                          <input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_materi')">
                      </form>
                  </div>
                  <div class="box-footer">
                    Footer
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        <?php
        if ($edit == true) {
          echo 'fillForm("'.$params[1].'");';
      }
      ?>

      $(".datepicker2").datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function(e){
          $(this).datepicker('hide');
      });

  });

      function simpan_data() {
        loading('loading', true);
        CKupdate();
        setTimeout(function() {
          $.ajax({
            url: base_url + 'manage',
            data: $("#form-soal").serialize(),
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
              loading('loading',false);
              if (json['data'].code === 1) {
                alert('Berhasil');
                loadContent(base_url + 'view/_form_soal');
            } else if(json['data'].code === 2){
                alert('Tidak Berhasil');
            } else{
                alert(json['data'].message);
            }
        },
        error: function () {
          loading('loading',false);
          alert('An error accurred');
      }
  });
      }, 100);
    }

    function fillForm(x) {
        $.ajax({
          url: base_url + 'object',
          data: 'model-input=soal&key-input=id_soal&value-input=' + x,
          dataType: 'json',
          type: 'POST',
          cache: false,
          success: function(json) {
            if (json['data'].code === 1) {
              $("#id_soal-input").val(json.data.object.id_soal).attr("readonly","");
              $("#pertanyaan-input").val(json.data.object.pertanyaan);
              $("#opsi_a-input").val(json.data.object.opsi_a);
              $("#opsi_b-input").val(json.data.object.opsi_b);
              $("#opsi_c-input").val(json.data.object.opsi_c);
              $("#opsi_d-input").val(json.data.object.opsi_d);
              $("#jawaban-input").val(json.data.object.jawaban);
              $("#id_materi").val(json.data.object.id_materi);
              $("#nama_guru-input").val(json.data.object.nama);
              $("#nip-input").val(json.data.object.nip);
              $("#tgl_posting-input").val(json.data.object.tgl_posting);
              $("#action-input").val("2");
              $("#value-input").val(x);
          }
      }
  });
    }
</script>
<?php
}
}
?>