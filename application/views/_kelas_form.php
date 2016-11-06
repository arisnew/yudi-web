<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Kelas</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="loading"></div>
			<form id="form-kelas">
				<label>Nama Kelas :</label>
				<input class="form-control" type="text" name="nama-input" id="nama-input" value="" autofocus="">
				<br>
				<label>Deskripsi :</label>
				<textarea class="form-control" name="deskripsi-input" id="deskripsi-input"></textarea>
				<br>
				<label>Status :</label>
				<select name="status-input" id="status-input" class="form-control">
					<option value="Aktif">Aktif</option>
					<option value="Nonaktif">Nonaktif</option>
				</select>
				<br>
				<br>
				<input type="hidden" name="model-input" id="model-input" value="kelas">
				<input type="hidden" name="action-input" id="action-input" value="1">
				<input type="hidden" name="key-input" id="key-input" value="id_kelas">
				<input type="hidden" name="value-input" id="value-input" value="0">

				<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
				<input type="reset" value="Batal" onclick="history.back()">
			</form>
		</div>
	</div>
</section>

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
                data: $("#form-kelas").serialize(),
                dataType: 'json',
                type: 'POST',
                cache: false,
                success: function(json) {
                    loading('loading',false);

                    if (json['data'].code === 1) {
                        alert('Penyimpanan data berhasil');
                        loadContent(base_url + 'view/_table_kelas');
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
            data: 'model-input=kelas&key-input=id_kelas&value-input=' + x,
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json['data'].code === 1) {
                    $("#nama-input").val(json.data.object.nama_kelas);
                    $("#deskripsi-input").val(json.data.object.deskripsi);
                    $("#status-input").val(json.data.object.status);
                    $("#action-input").val("2");	//edit
                    $("#value-input").val(x);
                }
            }
        });
    }
</script>