<?php
if ($param != null) {
    $soal = $this->model->getRecord(array('table' => 'v_soal', 'where' => array('id_soal' => $param)));
}
if ($param != null) {
    $siswa = $this->model->getRecord(array('table' => 'v_siswa', 'where' => array('nis' => $this->session->userdata('_ID'))));
}
?>
<section> 	
    <div class="container">
        <div class="row">
            <div id="content" class="col-xs-12">
                <h3 class="page-header"><i class="glyphicon glyphicon-user"></i> Data Siswa dan Ujian</h3>
                <div class="row">
                    <div class="col-md-3">NIS</div>
                    <div class="col-md-9">: <b><?php echo $siswa->nis;?> </b> </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">Nama Lengkap</div>
                    <div class="col-md-9">: <b><?php echo $siswa->nama;?> </b></div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">Kelas</div>
                    <div class="col-md-9">: <b><?php echo $siswa->nama_kelas;?></b></div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">Nama Mapel</div>
                    <div class="col-md-9">: <b><?php echo $soal->nama_mapel;?></b></div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">Jml. Soal</div>
                    <div class="col-md-9">: <b>1</b></div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">Waktu Mengerjakan</div>
                    <div class="col-md-9">: <b><?php echo $soal->durasi;?></b></div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" onclick="loadContent(base_url + 'view/_view_soal_siswa_2');" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i>Masuk Ujian</a>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
</section>