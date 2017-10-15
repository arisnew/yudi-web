<?php
$soal = $this->model->getRecord(array('table' => 'v_soal', 'where' => array('id_soal' => $param)));
?>
<section> 	
    <div class="container">
        <div class="row">
            <div id="content" class="col-xs-11">
            <h3 class="page-header"><b><?php echo $soal->nama_mapel;?></b></h3>
                <div class="col-md-8">
                <div class="konten-ujian"><div class="blok-soal soal-1 active">
                    <div class="box">
                        <div class="row">
                            <div class="col-xs-1">
                                <div class="nomor">nomer</div>
                            </div>
                            <div class="col-xs-11">
                                <div class="soal"><h2>pertanyaan</h2></div>
                            </div>
                        </div>
                        <div class="row pilihan">
                            <div class="col-xs-1 col-xs-offset-1">
                                <input type="radio" id="opsi_a" name="jawab-1">
                                <label onclick="" class="huruf" for="opsi_a"> A </label>
                            </div>
                            <div class="col-xs-10">
                                <div class="teks"><p>opsi a</p> </div> 
                            </div>
                        </div>
                        <div class="row pilihan">
                            <div class="col-xs-1 col-xs-offset-1">
                                <input type="radio" id="opsi_b" name="jawab-1">
                                <label onclick="" class="huruf" for="opsi_b"> B </label>
                            </div>
                            <div class="col-xs-10">
                                <div class="teks"><p>opsi b</p> </div> 
                            </div>
                        </div>
                        <div class="row pilihan">
                            <div class="col-xs-1 col-xs-offset-1">
                                <input type="radio" id="opsi_c" name="jawab-1">
                                <label onclick="" class="huruf" for="opsi_c"> C </label>
                            </div>
                            <div class="col-xs-10">
                                <div class="teks"><p>opsi c</p> </div> 
                            </div>
                        </div>
                        <div class="row pilihan">
                            <div class="col-xs-1 col-xs-offset-1">
                                <input type="radio" id="opsi_d" name="jawab-1">
                                <label onclick="" class="huruf" for="opsi_d"> D </label>
                            </div>
                            <div class="col-xs-10">
                                <div class="teks"><p>opsi d</p> </div> 
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
</section>