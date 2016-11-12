<section class="content-header">
	<h1>
		Form Siswa
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
			<h3 class="box-title">Form Siswa</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
			<form id="form-siswa">
				<label>Nis :</label>
				<input class="form-control" type="text" name="nis-input" id="nis-input" value="">
				<br>
				<label>Nama :</label>
				<input class="form-control" type="text" name="nama-input" id="nama-input" value="">
				<br>
				<label>Alamat :</label>
				<input class="form-control" type="text" name="alamat-input" id="alamat-input" value="">
				<br>
				<label>Kelas :</label>
				<input class="form-control" type="text" name="kelas-input" id="kelas-input" value="">
				<br>
				<input type="hidden" name="model-input" id="model-input" value="siswa">
				<input type="hidden" name="action-input" id="action-input" value="1">
				<input type="hidden" name="key-input" id="key-input" value="nis">
				<input type="hidden" name="value-input" id="value-input" value="0">

				<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
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

</section>
<!-- /.content -->
<script type="text/javascript">
	$(document).ready(function () {
		<?php
		if ($param) {
			echo 'fillForm("'.$param.'");';
		}
		?>
	});

	function simpan_data() {
		loading('loading', true);
		setTimeout(function() {
            $.ajax({
                url: base_url + 'manage',
                data: $("#form-siswa").serialize(),
                dataType: 'json',
                type: 'POST',
                cache: false,
                success: function(json) {
                    loading('loading',false);

                    if (json['data'].code === 1) {
                        alert('Penyimpanan data berhasil');
                        loadContent(base_url + 'view/_table_siswa');
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
        }, 1000);
    }

    function fillForm(x) {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=siswa&key-input=nis&value-input=' + x,
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json['data'].code === 1) {
                    $("#nis-input").val(json.data.object.nis).attr("readonly","");
                    $("#nama-input").val(json.data.object.nama);
                    $("#alamat-input").val(json.data.object.alamat);
                    $("#kelas-input").val(json.data.object.kelas);
                    $("#action-input").val("2");
                    $("#value-input").val(x);
                }
            }
        });
    }
</script>
