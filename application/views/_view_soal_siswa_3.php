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
         <div id="content" class="col-xs-11">
            <h3 class="page-header"><b>Mapel: Pemrograman Web <span class="pull-right"> Sisa Waktu: <span class="menit">09</span> : <span class="detik">01</span></span></b></h3>

            <input type="hidden" value="88" id="ujian">
            <input type="hidden" id="sisa_waktu" value="09:01"><div class="row">
            <div class="col-md-8"><div class="konten-ujian"><div class="blok-soal soal-1 active">
               <div class="box">
                  <div class="row">
                     <div class="col-xs-1"><div class="nomor">1</div></div>
                     <div class="col-xs-11"><div class="soal"><h2>teryeyery</h2></div> </div>
                 </div><div class="row pilihan">
                 <div class="col-xs-1 col-xs-offset-1">
                     <input type="radio" id="huruf-1-0" name="jawab-1">
                     <label onclick="kirim_jawaban(0, 4)" class="huruf" for="huruf-1-0"> A </label>
                 </div>
                 <div class="col-xs-10">
                     <div class="teks"><p>rtutruru</p> </div> 
                 </div>
             </div><div class="row pilihan">
             <div class="col-xs-1 col-xs-offset-1">
              <input type="radio" id="huruf-1-1" name="jawab-1">
              <label onclick="kirim_jawaban(0, 1)" class="huruf" for="huruf-1-1"> B </label>
          </div>
          <div class="col-xs-10">
              <div class="teks"><p>yytrtytry</p> </div> 
          </div>
      </div><div class="row pilihan">
      <div class="col-xs-1 col-xs-offset-1">
       <input type="radio" id="huruf-1-2" name="jawab-1">
       <label onclick="kirim_jawaban(0, 2)" class="huruf" for="huruf-1-2"> C </label>
   </div>
   <div class="col-xs-10">
       <div class="teks"><p>trturu</p> </div> 
   </div>
</div><div class="row pilihan">
<div class="col-xs-1 col-xs-offset-1">
    <input type="radio" id="huruf-1-3" name="jawab-1">
    <label onclick="kirim_jawaban(0, 3)" class="huruf" for="huruf-1-3"> D </label>
</div>
<div class="col-xs-10">
    <div class="teks"><p>rtutrururu</p> </div> 
</div>
</div><div class="row pilihan">
<div class="col-xs-1 col-xs-offset-1">
 <input type="radio" id="huruf-1-4" name="jawab-1">
 <label onclick="kirim_jawaban(0, 5)" class="huruf" for="huruf-1-4"> E </label>
</div>
<div class="col-xs-10">
 <div class="teks"><p>rurur</p> </div> 
</div>
</div></div><br><div class="row"><div class="col-md-3"></div>
<div class="col-md-4 col-md-offset-1"><label class="btn btn-warning btn-block"> <input type="checkbox" onchange="ragu_ragu(1)" autocomplete="off"> Ragu-ragu </label></div>	
<div class="col-md-3 col-md-offset-1"><a onclick="selesai()" class="btn btn-danger btn-block"> Selesai </a></div></div></div></div></div>
<div class="col-md-4"><div class="nomor-ujian"><div class="blok-nomor"><div class="box"> <a onclick="tampil_soal(1)" class="tombol-nomor tombol-1 ">1</a></div></div></div></div></div><div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-selesai" class="modal fade">
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

</form></div></div></div></div>
</div>
</div>
</section>