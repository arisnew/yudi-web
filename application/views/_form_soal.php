<?php
$edit = false;
$id_materi = 0;
if ($param) {
	$params = explode("__", $param);
	if (count($params) == 2) {
		//maka edit
		$edit = true;
		$id_soal = $params[1];
		$soal = $this->model->getRecord(array('table' => 'v_soal', 'where' => array('id_soal' => $id_soal)));
		if ($soal) {
			$id_materi = $soal->id_materi;
		}
	} else {
		//maka insert
		$id_materi = $param;
	}
	
	$materi = $this->model->getRecord(array('table' => 'v_materi', 'where' => array('id_materi' => $id_materi)));
	if ($materi) {

?>
<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Soal</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div id="loading"></div>
				<form id="form-soal" class="form-horizontal">
					<div class="form-group">
						<label for="jumlah_pertanyaan-input" class="col-sm-2 control-label">Jumlah Pertanyaan</label>
						<div class="col-sm-2">
							<input class="form-control" name="jumlah_pertanyaan-input" id="jumlah_pertanyaan-input" placeholder="Jumlah Pertanyaan" type="text">
						</div>
						<label for="tgl_posting-input" class="col-sm-2 control-label">Tanggal Posting</label>
						<div class="col-sm-2">
							<input class="form-control datepicker2" name="tgl_posting-input" id="tgl_posting-input" placeholder="yyyy-mm-dd" type="text">
						</div>
						<label for="durasi-input" class="col-sm-2 control-label">Durasi Soal</label>
						<div class="col-sm-2">
							<input class="form-control" name="durasi-input" id="durasi-input" placeholder="Durasi Soal" type="text">
						</div>
					</div>
					<button class="btn btn-primary" id="teruskan" type="button" onclick=" return false;"><i class="fa fa-save"></i> Set</button>
					<div class="form-group">
						<label for="materi-input" class="col-sm-2 control-label">Judul Materi</label>
						<div class="col-sm-10">
							<input type =" text" value="<?php echo $materi->judul;?>" class="form-control" name="materi-input" id="materi-input" >
						</div>
					</div>
					<div class="form-group">
						<label for="guru-input" class="col-sm-2 control-label">Nama Guru</label>
						<div class="col-sm-10">
							<input type ="text" value="<?php echo $materi->nama;?>" class="form-control" name="nama_guru-input" id="nama_guru-input" >
							<input type ="hidden" value="<?php echo $materi->nip;?>" class="form-control" name="guru-input" id="guru-input" >
						</div>
					</div>
					<div class="form-group">
						<label for="pertanyaan-input" class="col-sm-2 control-label">Pertanyaan</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="pertanyaan-input" id="pertanyaan-input" placeholder="Masukan Soal" type="text"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="opsi_a-input" class="col-sm-2 control-label">Pilihan A</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="opsi_a-input" id="opsi_a-input" placeholder="Opsi A" type="text"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="opsi_b-input" class="col-sm-2 control-label">Pilihan B</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="opsi_b-input" id="opsi_b-input" placeholder="Opsi B" type="text"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="opsi_c-input" class="col-sm-2 control-label">Pilihan C</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="opsi_c-input" id="opsi_c-input" placeholder="Opsi C" type="text"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="opsi_d-input" class="col-sm-2 control-label">Pilihan D</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="opsi_d-input" id="opsi_d-input" placeholder="Opsi D" type="text"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="jawaban-input" class="col-sm-2 control-label">Jawaban</label>
						<div class="col-sm-10">
							<select class="form-control" name="jawaban-input" id="jawaban-input">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
							</select>
						</div>
					</div>
					<input type="hidden" name="id_materi" id="id_materi" value="<?php echo $materi->id_materi;?>">
					<input type="hidden" name="model-input" id="model-input" value="soal">
					<input type="hidden" name="action-input" id="action-input" value="1">
					<input type="hidden" name="key-input" id="key-input" value="id_soal">
					<input type="hidden" name="value-input" id="value-input" value="0">

					<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
					<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_materi')">
				</form>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		<?php
		if ($edit == true) {
			echo 'fillForm("'.$params[1].'");';
		}
		?>
		//untuk meredonlykan 
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
</script>
		<?php
	}
}
?>