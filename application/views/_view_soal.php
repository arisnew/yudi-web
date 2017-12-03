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
                    <button id="selesai-btn" class="btn btn-danger" onclick="">Selesai</button>
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="content-soal">
        <div class="box">
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
                    <div id="loading"></div>
                    <input type="hidden" name="id-jawaban" id="id-jawaban" value="">
                    <div id="pertanyaan">
                    </div>
                    <label>
                        <input type="radio" value="A" id="opsi-input-a" name="opsi-input">
                        <span id="jawaban-a">
                        </span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" value="B" id="opsi-input-b" name="opsi-input">
                        <span id="jawaban-b">
                        </span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" value="C" id="opsi-input-c" name="opsi-input">
                        <span id="jawaban-c">
                        </span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" value="D" id="opsi-input-d" name="opsi-input">
                        <span id="jawaban-d">
                        </span>
                    </label>
                    <input type="hidden" name="soal-input" id="soal-input" value="">
                    <input type="hidden" name="model-input" id="model-input" value="tes">
                    <input type="hidden" name="key-input" id="key-input" value="id_jawaban">
                    <input type="hidden" name="action-input" id="action-input" value="2">
                    <input type="hidden" name="value-input" id="value-input" value="">
                </form>
            </div>
            <div class="box-footer">
                <input type="hidden" name="current-urutan" id="current-urutan" value="0">
                <input type="hidden" name="id-prev" id="id-prev" value="0">
                <input type="hidden" name="id-next" id="id-next" value="0">
                <button id="sebelumnya-btn" class="btn btn-primary pull-left" onclick="doPrev($('#id-prev').val(), true); return false;">Sebelumnya</button>
                <button id="selanjutnya-btn" class="btn btn-primary pull-right" onclick="doNext($('#id-next').val(), true); return false;">Selanjutnya</button>
            </div>
        </div>
    </section>

<?php
}
?>
<script type="text/javascript">
    //var currentUrutan = 0;
    $(document).ready(function () {
        doNext(urutan[$("#current-urutan").val()]);
    });

    function loadSoal(n, callback) {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=v_tes_jawaban&key-input=id_jawaban&action-input=1&value-input=' + n,
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json.data.code === 1) {
                    if (json.data.object !== null) {
                        //isi kedalam form
                        $("#soal-input").val(json.data.object.id_soal);
                        $("#id-jawaban").val(json.data.object.id_jawaban);
                        $("#value-input").val(json.data.object.id_jawaban);
                        $("#pertanyaan").html(json.data.object.pertanyaan);
                        $("#jawaban-a").html(json.data.object.opsi_a);
                        $("#jawaban-b").html(json.data.object.opsi_b);
                        $("#jawaban-c").html(json.data.object.opsi_c);
                        $("#jawaban-d").html(json.data.object.opsi_d);
                        //jawaban yang sudah ada?
                        if (json.data.object.jawaban_siswa != '') {
                            $("input[name='opsi-input'][value='"+json.data.object.jawaban_siswa+"']").prop("checked", true);
                        } else {
                            $("input[name='opsi-input']").prop("checked", false);
                        }

                        if (typeof callback == 'function') {
                            callback(json.data.object.id_jawaban);
                        }
                    }

                } else{
                    $("#id-jawaban").val("");
                    $("#value-input").val("0");
                    $("#pertanyaan").html("");
                    $("#jawaban-a").html("");
                    $("#jawaban-b").html("");
                    $("#jawaban-c").html("");
                    $("#jawaban-d").html("");

                    if (typeof callback == 'function') {
                        callback(0);
                    }
                }
            },
            error: function () {
                alert('An error accurred');
            }
        });
    }

    function doNext(idNext, doSave) {
        //save (update) current jawaban
        if (doSave == true) {
            simpan_data(function () {
                //load jawaban ke idNext
                loadSoal(idNext, function (x) {
                    //change id next & rev
                    $("#id-prev").val(idNext);
                    $("#id-next").val(nextId());
                });
            });
        } else {
            //load jawaban ke idNext
            loadSoal(idNext, function (x) {
                //change id next & rev
                $("#id-prev").val(idNext);
                $("#id-next").val(nextId());
            });
        }
    }

    function doPrev(idNext, doSave) {
        //save (update) current jawaban
        if (doSave == true) {
            simpan_data(function () {
                //load jawaban ke idNext
                loadSoal(idNext, function (x) {
                    //change id next & rev
                    $("#id-prev").val(prevId());
                    $("#id-next").val(idNext);
                });
            });
        } else {
            //load jawaban ke idNext
            loadSoal(idNext, function (x) {
                //change id next & rev
                $("#id-prev").val(prevId());
                $("#id-next").val(idNext);
            });
        }
    }

    function nextId() {
        if (parseInt($("#current-urutan").val()) < urutan.length) {
            $("#current-urutan").val(parseInt($("#current-urutan").val()) + 1).change();
            return urutan[$("#current-urutan").val()];
        } else {
            return urutan[$("#current-urutan").val()];
        }
    }

    function prevId() {
        if (parseInt($("#current-urutan").val()) == 0) {
            $("#current-urutan").val(0);
            return urutan[$("#current-urutan").val()];
        } else {
            $("#current-urutan").val(parseInt($("#current-urutan").val()) - 1).change();
            return urutan[$("#current-urutan").val()];
        }
    }

    function simpan_data(callback) {
        loading('loading', true);
        setTimeout(function() {
            $.ajax({
                url: base_url + 'manage',
                data: $("#form-test").serialize(),
                dataType: 'json',
                type: 'POST',
                cache: false,
                success: function(json) {
                    loading('loading',false);
                    if (json['data'].code === 1) {
                        alert('Penyimpanan data berhasil');
                        //loadContent(base_url + 'view/_table_pesan');
                    } else if(json['data'].code === 2){
                        alert('Penyimpanan data tidak berhasil');
                    } else{
                        alert(json['data'].message);
                    }

                    if (typeof callback == 'function') {
                        callback();
                    }
                },
                error: function () {
                    loading('loading',false);
                    alert('An error accurred');
                }
            });
        }, 100);
    }

</script>


