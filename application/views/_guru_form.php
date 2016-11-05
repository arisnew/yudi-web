<div class="col-sm-8">
	<form id="form-guru">
		<div id="loading"></div>
		<label>ID</label>
		<input class="form-control" type="text" id="id-input" name="id-input">
		<br>
		<label>Nama</label>
		<input class="form-control" type="text" id="nama-input" name="nama-input">
		<br>
		<label>Mata Pelajaran</label>
		<input class="form-control" type="text" id="mp-input" name="mp-input">
		<br>
		<label>Email</label>
		<input class="form-control" type="text" id="email-input" name="email-input">
		<br>
		<input type="hidden" name="model-input" id="model-input" value="guru">
		<input type="hidden" name="action-input" id="action-input" value="1">
		<input type="hidden" name="key-input" id="key-input" value="id_guru">
		<input type="hidden" name="value-input" id="value-input" value="0">
		<button class="btn btn-success" onclick="proses_simpan(); return false;"><i class="fa fa-save"></i> Simpan</button>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		//
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
</script>