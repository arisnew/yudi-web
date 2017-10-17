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
                                <div class="box">
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
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1"><a onclick="" class="btn btn-danger btn-block"> Kembali </a></div>  
                                    <div class="col-md-3 col-md-offset-1"><a onclick="" class="btn btn-info btn-block"> Lanjutkan </a></div>
                                </div>
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