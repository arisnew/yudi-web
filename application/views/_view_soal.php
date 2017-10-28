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
                <div class="col-md-3">NIS</div>
                <div class="col-md-9">: <b><?php echo $siswa->nis;?> </b> </div>
                <br>
                <div class="col-md-3">Nama Lengkap</div>
                <div class="col-md-9">: <b><?php echo $siswa->nama;?> </b></div>          
                <br>
                <div class="col-md-3">Kelas</div>
                <div class="col-md-9">: <b><?php echo $siswa->nama_kelas;?></b></div>
                <br>
                <div class="col-md-3">Nama Mapel</div>
                <div class="col-md-9">: <b><?php echo $soal->nama_mapel;?></b></div>
                <br>
                <div class="col-md-3">Jml. Soal</div>
                <div class="col-md-9">: <b>1</b></div>
                <br>
                <div class="col-md-3">Waktu Mengerjakan</div>
                <div class="col-md-9">: <b><?php echo $soal->durasi;?></b></div>
                <br>
                <div class="col-md-12">
                    <button class="btn btn-primary" id="kerjakan-btn" type="button" onclick="teruskan(); return false;"><i class="glyphicon glyphicon-log-in"></i> Kerjakan </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content" id="content-soal" style="display: none;">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo $soal->nama_mapel;?></h3>
			<div class="box-tools pull-right">
				<button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" type="button" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body no-padding">
			<div class="mailbox-read-info">
				<h2><?php echo $soal->judul;?></h2>
				<h5><?php echo $soal->nama;?><span class="mailbox-read-time pull-right"><?php echo $soal->tgl_posting;?></span></h5>
			</div>
			<div class="mailbox-controls with-border text-center"></div>
			<div class="mailbox-read-message">
              <?php echo $soal->pertanyaan;?>
              <label>
                 <input type="radio" value="option1" id="opsi_a" name="opsi_a-input">
                 <?php echo $soal->opsi_a;?>
             </label>
             <br>
             <label>
                 <input type="radio" value="option1" id="opsi_b" name="opsi_b-input">
                 <?php echo $soal->opsi_b;?>
             </label>
             <br>
             <label>
                 <input type="radio" value="option1" id="opsi_c" name="opsi_c-input">
                 <?php echo $soal->opsi_c;?>
             </label>
             <br>
             <label>
                 <input type="radio" value="option1" id="opsi_d" name="opsi_d-input">
                 <?php echo $soal->opsi_d;?>
             </label>
         </div>
         <div class="box-footer">
            <button id="sebelumnya-btn" class="btn btn-primary pull-left">Sebelumnya</button>
            <button id="selanjutnya-btn" class="btn btn-primary pull-right">Selanjutnya</button>
         </div>
       </div>
   </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        <?php
        if ($param) {
            //echo 'fillForm("'.$param.'");';
        }
        ?>
    });

    function teruskan() {
        //document.get
        $("#kerjakan-btn").hide();
        $("#content-soal").show();

    }
</script>
