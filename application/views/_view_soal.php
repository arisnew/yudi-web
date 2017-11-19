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
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="content-soal">
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
                $urutan = array();
                $soals = $this->model->getListByQuery(" SELECT * FROM v_tes_jawaban where id_tes = $param ORDER BY id_jawaban ASC");
                if ($soals) {
                    foreach ($soals as $soal) {
                        $urutan[] = $soal->id_jawaban;
                    }
                    ?>
                    <script type='text/javascript'>
                        <?php
                        $js_array = json_encode($urutan);
                        echo "var urutan = ". $js_array . ";\n";
                        ?>
                    </script>
                    <?php
                }
                ?>
                    <div class="mailbox-read-message">
                        <form id="form-test">
                            <input type="hidden" name="id-jawaban" id="id-jawaban" value="">
                            <div id="pertanyaan">
                            </div>
                            <label>
                                <input type="radio" value="A" id="opsi-input" name="opsi-input">
                                <span id="jawaban-a">
                                </span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="B" id="opsi-input" name="opsi-input">
                                <span id="jawaban-b">
                                </span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="C" id="opsi-input" name="opsi-input">
                                <span id="jawaban-c">
                                </span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="D" id="opsi-input" name="opsi-input">
                                <span id="jawaban-d">
                                </span>
                            </label>
                        </form>
                    </div>
                <div class="box-footer">
                    <input type="hidden" name="id-prev" id="id-prev" value="">
                    <input type="hidden" name="id-next" id="id-next" value="">
                    <button id="sebelumnya-btn" class="btn btn-danger pull-left" onclick="doPrev($('#id-prev').val()); return false;">Sebelumnya</button>
                    <button id="selanjutnya-btn" class="btn btn-primary pull-right" onclick="doNext($('#id-next').val()); return false;">Selanjutnya</button>
                </div>
            </div>
        </div>
    </section>

<?php
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        loadSoal(urutan[0]);
        <?php
        if ($param) {
            //echo 'fillForm("'.$param.'");';
        }
        ?>
    });

    function loadSoal(n) {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=v_tes_jawaban&key-input=id_jawaban&action-input=1&value-input=' + n,
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json.data.code === 1) {
                    //isi kedalam form
                    $("#id-jawaban").val(json.data.object.id_jawaban);
                    $("#pertanyaan").html(json.data.object.pertanyaan);
                    $("#jawaban-a").html(json.data.object.opsi_a);
                    $("#jawaban-b").html(json.data.object.opsi_b);
                    $("#jawaban-c").html(json.data.object.opsi_c);
                    $("#jawaban-d").html(json.data.object.opsi_d);
                    //next & prev?

                    //do test
                } else{
                    $("#id-jawaban").val("");
                    $("#pertanyaan").html("");
                    $("#jawaban-a").html("");
                    $("#jawaban-b").html("");
                    $("#jawaban-c").html("");
                    $("#jawaban-d").html("");
                }
            },
            error: function () {
                alert('An error accurred');
            }
        });
    }

    function doNext(idNext) {
        //change id next & rev
        loading("form-test", true);
                $.ajax({
                    url: base_url + 'object',
                    data: 'model-input=v_tes_jawaban&key-input=id_jawaban&action-input=1&value-input=' + idNext,
                    type: 'POST',
                    dataType: "json",
                    cache: false,
                    success: function (json) {
                        loading("loading", false);
                        if (json.data.code == 1) {
                            alert("Lanjutkan Soal Berikutnya?");
                            loadContent(base_url + 'view/');
                        } else if(json.data.code == 2) {
                            alert("Belum Mengisi Jawaban!");
                        } else{
                            alert(json.data.message);
                        }
                    },
                });
        }

    function doPrev(idPrev) {
        //change id next & rev

        //load jawaban ke idPrev
        loadSoal(idPrev);
    }

</script>


