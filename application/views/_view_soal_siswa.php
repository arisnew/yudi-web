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
            <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" type="button" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
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
                        <div class="konten-ujian"><div class="blok-soal soal-1 active">
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
                                        <input type="radio" id="opsi_a" name="jawab-1">
                                        <label onclick="" class="huruf" for="opsi_a"> A </label>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="teks"><p><?php echo $soal->opsi_a;?></p> </div> 
                                    </div>
                                </div>
                                <div class="row pilihan">
                                    <div class="col-xs-1 col-xs-offset-1">
                                        <input type="radio" id="opsi_b" name="jawab-1">
                                        <label onclick="" class="huruf" for="opsi_b"> B </label>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="teks"><p><?php echo $soal->opsi_b;?></p> </div> 
                                    </div>
                                </div>
                                <div class="row pilihan">
                                    <div class="col-xs-1 col-xs-offset-1">
                                        <input type="radio" id="opsi_c" name="jawab-1">
                                        <label onclick="" class="huruf" for="opsi_c"> C </label>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="teks"><p><?php echo $soal->opsi_c;?></p> </div> 
                                    </div>
                                </div>
                                <div class="row pilihan">
                                    <div class="col-xs-1 col-xs-offset-1">
                                        <input type="radio" id="opsi_d" name="jawab-1">
                                        <label onclick="" class="huruf" for="opsi_d"> D </label>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="teks"><p><?php echo $soal->opsi_d;?></p> </div> 
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4 col-md-offset-1">
                                    <label class="btn btn-warning btn-block">
                                        <input type="checkbox" onchange="ragu_ragu(1)" autocomplete="off"> Ragu-ragu </label>
                                    </div>  
                                    <div class="col-md-3 col-md-offset-1"><a onclick="selesai()" class="btn btn-danger btn-block"> Selesai </a></div>
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
                <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-selesai" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form onsubmit="return selesai_ujian(88)">
                                <div class="modal-header">
                                    <h3 class="modal-title">Selesai Ujian</h3>
                                </div>
                                <div class="modal-body">
                                    <p>Pastikan semua soal telah dikerjakan sebelum mengklik selesai. Setelah klik selesai Anda tidak dapat mengerjakan ujian lagi. Yakin akan menyelesaikan ujian? </p>
                                    <div class="chekbox-selesai"><input type="checkbox" required=""> Saya yakin akan menyelesaikan ujian.</div>
                                </div>
                                <div class="modal-footer">
                                    <button onclick="return selesai_ujian(88)" class="btn btn-danger" type="submit"> Selesai </button>
                                    <button data-dismiss="modal" class="btn btn-warning" type="button"> Batal </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>