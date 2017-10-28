<?php
if ($param != null) {
    $soal = $this->model->getRecord(array('table' => 'v_soal', 'where' => array('id_soal' => $param)));
}
if ($param != null) {
    $siswa = $this->model->getRecord(array('table' => 'v_siswa', 'where' => array('nis' => $this->session->userdata('_ID'))));
}
?>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><b><?php echo $soal->judul;?></b></h3>
        </div>
        <div class="container">
            <div class="row">
                <div id="content" class="col-xs-11">
                    <div class="row">
                        <div class="col-md-3"><b>NIS</b></div>
                        <div class="col-md-9">: <b><?php echo $siswa->nis;?> </b> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><b>Nama</b></div>
                        <div class="col-md-9">: <b><?php echo $siswa->nama;?> </b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><b>Kelas</b></div>
                        <div class="col-md-9">: <b><?php echo $siswa->nama_kelas;?></b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><b>Mata Pelajaran</b></div>
                        <div class="col-md-9">: <b><?php echo $soal->nama_mapel;?></b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><b>Jumlah Soal</b></div>
                        <div class="col-md-9">: <b>1</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><b>Waktu Mengerjakan</b></div>
                        <div class="col-md-9">: <b><?php echo $soal->durasi;?></b></div>
                    </div><br>
                    <div class="col-md-8">
                        <div class="konten-ujian">
                            <div class="blok-soal soal-1 active">
                                <div class="row">
                                        <div class="col-xs-1">
                                            <div class="nomor">nomer</div>
                                        </div>
                                        <div class="col-xs-11">
                                            <div class="soal"><h2><?php echo $soal->pertanyaan;?></h2></div>
                                        </div>
                                    </div>
                                    <div class="row pilihan">
                                        <div class="col-xs-1 col-xs-offset-1">
                                        <input type="radio" id="opsi_a-input" name="opsi_a-input">
                                            <label onclick="" class="huruf" for="opsi_a-input"> A </label>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="teks"><p><?php echo $soal->opsi_a;?></p> </div> 
                                        </div>
                                    </div>
                                    <div class="row pilihan">
                                        <div class="col-xs-1 col-xs-offset-1">
                                            <input type="radio" id="opsi_b-input" name="opsi_b-input">
                                            <label onclick="" class="huruf" for="opsi_b-input"> B </label>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="teks"><p><?php echo $soal->opsi_b;?></p> </div> 
                                        </div>
                                    </div>
                                    <div class="row pilihan">
                                        <div class="col-xs-1 col-xs-offset-1">
                                            <input type="radio" id="opsi_c-input" name="opsi_c-input">
                                            <label onclick="" class="huruf" for="opsi_c-input"> C </label>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="teks"><p><?php echo $soal->opsi_c;?></p> </div> 
                                        </div>
                                    </div>
                                    <div class="row pilihan">
                                        <div class="col-xs-1 col-xs-offset-1">
                                            <input type="radio" id="opsi_d-input" name="opsi_d">
                                            <label onclick="" class="huruf" for="opsi_d-input"> D </label>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="teks"><p><?php echo $soal->opsi_d;?></p> </div> 
                                        </div>
                                    </div>
                                </div>
                                <br>
                                    <button class="btn btn-danger" id="kembali" type="button" onclick=" return false;"> Kembali </button>  
                                    <button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="nomor-ujian">
                            <div class="blok-nomor">
                                <div class="box"> <a onclick="tampil_soal(1)" class="tombol-nomor tombol-1 ">1</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
            $(document).ready(function () {
                <?php
                if ($edit == true) {
                    echo 'fillForm("'.$params[1].'");';
                }
                ?>
                //untuk meredonlykan 
                $("#teruskan").on("click",function () {
                    $("#j-input").attr("readonly","");
                    $("#tgl_posting-input").attr("readonly","");
                    $("#durasi-input").attr("readonly","");
                })

            });

            function clear_form() {
                $("#opsi_a-input").val("");
                $("#opsi_b-input").val("");
                $("#opsi_c-input").val("");
                $("#opsi_d-input").val("");
                
            }

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
                                alert('Penyimpanan data berhasil');
                                //loadContent(base_url + 'view/_table_soal');
                                if ($("#jumlah_pertanyaan-input").val() > 0) {
                                    clear_form();
                                    //dec
                                    $("#jumlah_pertanyaan-input").val($("#jumlah_pertanyaan-input").val() - 1);
                                    if ($("#jumlah_pertanyaan-input").val() == 0) {
                                        loadContent(base_url + 'view/_table_soal_guru');
                                    }
                                } else {
                                    loadContent(base_url + 'view/_table_soal_guru');
                                }
                            } else if(json['data'].code === 2){
                                alert('Penyimpanan data tidak berhasil');
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
                            $("#nip-input").val(json.data.object.nip);
                            $("#durasi-input").val(json.data.object.durasi);
                            $("#tgl_posting-input").val(json.data.object.tgl_posting);
                            $("#action-input").val("2");
                            $("#value-input").val(x);
                        }
                    }
                });
            }
        </script>