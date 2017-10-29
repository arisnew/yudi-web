<?php
$tes = null;
if ($param != null) {
    $tes = $this->model->getRecord(array('table' => 'v_tes', 'where' => array('id_tes' => $param)));
}
if ($tes) {
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div id="content" class="col-xs-12">
                    <h3 class="page-header"><i class="glyphicon glyphicon-user"></i> Data Siswa dan Ujian</h3>
                    <div class="col-xs-3">NIS</div>
                    <div class="col-xs-9">: <b><?php echo $tes->nis;?> </b> </div>
                    <br>
                    <div class="col-xs-3">Nama Lengkap</div>
                    <div class="col-xs-9">: <b><?php echo $tes->nama_siswa;?> </b></div>          
                    <br>
                    <div class="col-xs-3">Kelas</div>
                    <div class="col-xs-9">: <b><?php echo $tes->nama_kelas;?></b></div>
                    <br>
                    <div class="col-xs-3">Nama Guru</div>
                    <div class="col-xs-9">: <b><?php echo $tes->nama;?></b></div>
                    <br>
                    <div class="col-xs-3">Nama Mapel</div>
                    <div class="col-xs-9">: <b><?php echo $tes->nama_mapel;?></b></div>
                    <br>
                    <div class="col-xs-3">Nama Materi</div>
                    <div class="col-xs-9">: <b><?php echo $tes->judul;?></b></div>
                    <br>
                    <div class="col-xs-3">Tanngal Posting</div>
                    <div class="col-xs-9">: <b><?php echo $tes->tgl_posting;?></b></div>
                    <br>
                    <div class="col-xs-3">Jml. Soal</div>
                    <div class="col-xs-9">: <b><?php echo $tes->jml_soal;?></b></div>
                    <br>
                    <div class="col-xs-3">Waktu Mengerjakan</div>
                    <div class="col-xs-9">: <b><?php echo $tes->total_durasi;?></b></div>
                    <br>
                    <div class="col-xs-12">
                        <button class="btn btn-primary" id="kerjakan-btn" type="button" onclick="teruskan(); return false;"><i class="glyphicon glyphicon-log-in"></i> Kerjakan </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="content-soal" style="display: none;">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" type="button" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body no-padding">
                <div class="mailbox-controls with-border text-center">
                    
                </div>
                <?php
                $soals = $this->model->getList(array('table' => 'v_tes_jawaban', 'where' => array(
                    'id_tes' => $param
                    )));
                if ($soals) {
                    foreach ($soals as $soal) {
                        ?>
                        <div class="mailbox-read-message">
                            <div id="pertanyaan">
                                <?php echo $soal->pertanyaan;?>
                            </div>
                            <label>
                                <input type="radio" value="A" id="opsi-input" name="opsi-input">
                                <span id="jawaban-a">
                                    <?php echo $soal->opsi_a;?>
                                </span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="B" id="opsi-input" name="opsi-input">
                                <span id="jawaban-b">
                                    <?php echo $soal->opsi_b;?>
                                </span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="C" id="opsi-input" name="opsi-input">
                                <span id="jawaban-c">
                                    <?php echo $soal->opsi_c;?>
                                </span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="D" id="opsi-input" name="opsi-input">
                                <span id="jawaban-d">
                                    <?php echo $soal->opsi_d;?>
                                </span>
                            </label>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="box-footer">
                    <button id="sebelumnya-btn" class="btn btn-danger pull-left">Sebelumnya</button>
                    <button id="selanjutnya-btn" class="btn btn-primary pull-right">Selanjutnya</button>
                </div>
            </div>
        </div>
    </section>

<?php
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        <?php
        if ($param) {
            //echo 'fillForm("'.$param.'");';
        }
        ?>
    });

    function teruskan() {
        /*$.ajax({
            url: base_url + 'generate_soal/<?php echo $param;?>/<?php echo $siswa->nis;?>',
            data: 'id=0',
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json.code === 1) {
                    alert(json.msg + json.last_id);
                    //do test
                } else if(json.code === 2){
                    alert(json.msg);
                    //sudah test sebelumnya
                } else{
                    alert(json.msg);
                    //tidak valid
                }
            },
            error: function () {
                alert('An error accurred');
            }
        });
*/
        //document.get
        $("#kerjakan-btn").hide();
        $("#content-soal").show();

    }
</script>
