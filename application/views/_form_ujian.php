<?php
if ($param != null) {
	$soal = $this->model->getRecord(array('table' => 'v_soal', 'where' => array('id_soal' => $param)));
}
if ($param != null) {
	$siswa = $this->model->getRecord(array('table' => 'v_siswa', 'where' => array('nis' => $this->session->userdata('_ID'))));
}
?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"> Soal Tes </h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="form-group">
					<div class="col-md-3">
						<b>NIS</b>
					</div>
					<div class="col-md-9">:
						<b><?php echo $siswa->nis;?> </b>
					</div>
					<div class="col-md-3">
						<b>Nama</b>
					</div>
					<div class="col-md-9">:
						<b><?php echo $siswa->nama;?></b>
					</div>
					<div class="col-md-3">
						<b>Kelas</b>
					</div>
					<div class="col-md-9">:
						<b><?php echo $siswa->nama_kelas;?></b>
					</div>
					<div class="col-md-3">
						<b>Mata Pelajaran</b>
					</div>
					<div class="col-md-9">:
						<b><?php echo $soal->nama_mapel;?></b>
					</div>
					<div class="col-md-3">
						<b>Jumlah Soal</b>
					</div>
					<div class="col-md-9">:
						<b>1</b>
					</div>
					<div class="col-md-3">
						<b>Waktu Mengerjakan</b>
					</div>
					<div class="col-md-9">:
						<b><?php echo $soal->durasi;?></b>
					</div>
				</div>
			</div>
			<div class="box-header with-border">
				<h3 class="box-title"> Soal Tes </h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div id="loading"></div>
				<form id="form-test" class="form-horizontal">
					<div class="row">
						<div class="col-xs-11">
							<div class="soal"><?php echo $soal->pertanyaan;?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-1">	
							<input type="radio" id="opsi_a-input" name="opsi_a-input">
							<label onclick="" class="huruf" for="opsi_a-input"> A </label>	
						</div>
						<div class="col-xs-10">
							<div class="teks"><p><?php echo $soal->opsi_a;?></p> </div> 
						</div>
					</div>
					<div class="row">
						<div class="col-xs-1">
							<input type="radio" id="opsi_b-input" name="opsi_b-input">
							<label onclick="" class="huruf" for="opsi_b-input"> B </label>
						</div>
						<div class="col-xs-10">
							<div class="teks"><p><?php echo $soal->opsi_b;?></p> </div> 
						</div>
					</div>
					<div class="row">
						<div class="col-xs-1">
							<input type="radio" id="opsi_c-input" name="opsi_c-input">
							<label onclick="" class="huruf" for="opsi_c-input"> C </label>
						</div>
						<div class="col-xs-10">
							<div class="teks"><p><?php echo $soal->opsi_c;?></p> </div> 
						</div>
					</div>
					<div class="row">
						<div class="col-xs-1">
							<input type="radio" id="opsi_d-input" name="opsi_d">
							<label onclick="" class="huruf" for="opsi_d-input"> D </label>
						</div>
						<div class="col-xs-10">
							<div class="teks"><p><?php echo $soal->opsi_d;?></p> </div> 
						</div>
					</div>
					<button class="btn btn-danger" type="submit" onclick="simpan_data(); return false;"> Kembali</button>
					<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"> Lanjutkan</button>
				</form>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">
	$(document).ready(function () {
			<?php
			if ($param) {
				echo 'fillForm("'.$param.'");';
			}
			?>

			$("#teruskan").on("click",function () {
					$("#jumlah_pertanyaan-input").attr("readonly","");
					$("#tgl_posting-input").attr("readonly","");
					$("#durasi-input").attr("readonly","");
				})

				$(".datepicker2").datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function(e){
					$(this).datepicker('hide');
				});

				CKEDITOR.replace('pertanyaan-input');

			});

			function clear_form() {
				CKEDITOR.instances['pertanyaan-input'].setData("");
				$("#opsi_a-input").val("");
				$("#opsi_b-input").val("");
				$("#opsi_c-input").val("");
				$("#opsi_d-input").val("");
				$("#jawaban-input").val("");
				
			}

	function simpan_data() {
		loading('loading', true);
		CKupdate();
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
								//loadContent(base_url + 'view/_table_soal');
								if ($("#pertanyaan-input").val() > 0)
									($("#opsi_a-input").val() > 0)
									($("#opsi_b-input").val() > 0)
									($("#opsi_c-input").val() > 0)
									($("#opsi_d-input").val() > 0)
									 {
									clear_form();
									//dec
									$("#pertanyaan-input").val($("#pertanyaan-input").val() - 1);
								} else {
									loadContent(base_url + 'view/_table_soal');
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
					$("#nama_guru-input").val(json.data.object.nama);
					$("#nip-input").val(json.data.object.nip);
					$("#tgl_posting-input").val(json.data.object.tgl_posting);
					$("#action-input").val("2");
					$("#value-input").val(x);
				}
			}
		});
	}