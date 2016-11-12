<section class="content-header">
	<h1>
		Form Guru
		<small>it all starts here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Examples</a></li>
		<li class="active">Blank page</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Guru</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
			<form id="form-guru">
				<label>Id_Guru :</label>
				<input class="form-control" type="text" name="id_guru-input" id="id_guru-input" value="">
				<br>
				<label>Nama :</label>
				<input class="form-control" type="text" name="nama-input" id="nama-input" value="">
				<br>
				<label>Mata Pelajaran :</label>
				<input class="form-control" type="text" name="matapelajaran-input" id="matapelajaran-input" value="">
				<br>
				<label>Email :</label>
				<input class="form-control" type="text" name="email-input" id="email-input" value="">
				<br>
				<input type="hidden" name="model-input" id="model-input" value="guru">
				<input type="hidden" name="action-input" id="action-input" value="1">
				<input type="hidden" name="key-input" id="key-input" value="id_guru">
				<input type="hidden" name="value-input" id="value-input" value="0">

				<button class="btn btn-primary" type="submit" onclick="proses_simpan(); return false;"><i class="fa fa-save"></i> Simpan</button>
				<input type="reset" value="Batal" onclick="history.back()">
			</form>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			Footer
		</div>
		<!-- /.box-footer-->
	</div>
	<!-- /.box -->

<script type="text/javascript">
	$(document).ready(function () {
		<?php
		if ($param) {
			echo 'fillForm("'.$param.'");';
		}
		?>
	});

	function proses_simpan() {
		loading("loading", true);
		setTimeout(function () {
			//ajax jalan
			$.ajax({
				url: base_url + 'manage',
				type: 'POST',
				dataType: "json",
				data: $("#form-guru").serialize(),
				cache: false,
				success: function (json) {
					loading("loading", false);
					if (json.data.code == 1) {
						alert("Simpan data berhasil");
						loadContent(base_url + 'view/_table_guru');
					} else if(json.data.code == 2) {
						alert("Simpan data gagal!");
					} else{
						alert(json.data.message);
					}
				},
				error: function () {
					loading("loading", false);
					alert("Respon server gagal!");
				}
			});
		}, 2000);
	}

	function fillForm(x) {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=guru&key-input=id_guru&value-input=' + x,
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json['data'].code === 1) {
                    $("#id_guru-input").val(json.data.object.id_guru);
                    $("#nama-input").val(json.data.object.nama);
                    $("#matapelajaran-input").val(json.data.object.matapelajaran);
                    $("#email-input").val(json.data.object.email);
                    $("#action-input").val("2");
                    $("#value-input").val(x);
                }
            }
        });
    }
</script>