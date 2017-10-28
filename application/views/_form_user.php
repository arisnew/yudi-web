<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Admin</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box box-body">
				<div class="row">
					<div class="col-md-6">
						<form id="form-user" class="form-horizontal">
							<div class="form-group">
								<label for="username-input" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<input class="form-control" name="username-input" id="username-input" placeholder="Username" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="nama-input" class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-10">
									<input class="form-control" name="nama-input" id="nama-input" placeholder="Nama" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="email-input" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input class="form-control" name="email-input" id="email-input" placeholder="Email" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="password-input" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input class="form-control" name="password-input" id="password-input" placeholder="Password" type="password">
								</div>
							</div>
							<div class="form-group">
								<label for="status-input" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-10">
									<select class="form-control" name="status-input" id="status-input">
										<option value="Aktif">Aktif</option>
										<option value="Nonaktif">Nonaktif</option>
									</select>
								</div>
							</div>
							<div id="div-foto">
							</div>
							<div id="div-upload" style="display: none">
								<label>Foto</label>
								<input type="file" name="file_upload" id="file_upload" class="image" >
							</div>
							<input type="hidden" name="model-input" id="model-input" value="user">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="username">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_admin')">
						</form>
					</div>
				</div>
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

					// file upload
					$("#file_upload").fileinput({
						maxFileCount: 1,
						browseClass: "btn btn-default",
						browseLabel: "Pilih file",
						browseIcon: '<i class="fa fa-file"></i> ',
						removeClass: "btn btn-warning",
						removeLabel: "Hapus",
						removeIcon: '<i class="glyphicon glyphicon-trash"></i> ',
						uploadClass: "btn btn-info",
						uploadLabel: "Unggah",
						uploadIcon: '<i class="fa fa-cloud-upload"></i> ',
						previewFileType: "image",
			            uploadUrl: "<?php echo base_url('doupload'); ?>", // your upload server url
			            msgFilesTooMany: 'Jumlah berkas yang akan diunggah ({n}) melebihi batas jumlah yang sudah ditentukan ({m}). Coba ulangi proses unggah berkas!',
			            msgLoading: 'Memproses berkas {index} dari {files} …',
			            msgProgress: 'Memproses berkas {index} dari {files} - {name} - {percent}% selesai.',
			            uploadExtraData: function() {
			            	return {
			            		nama_field:'file_upload',
			            		model:'user',
			            		key: 'username',
			            		value:$("#form-user #username-input").val()
			            	};
			            }
			        });

			        //refresh if succes upload...
			        $('#file_upload').on('filebatchuploadcomplete', function(event, files, extra) {
			        	loadContent(base_url + "view/_form_user/" + $("#username-input").val());
			        });
			    });


	function simpan_data() {
		loading('loading', true);
		setTimeout(function() {
			$.ajax({
				url: base_url + 'manage',
				data: $("#form-user").serialize(),
				dataType: 'json',
				type: 'POST',
				cache: false,
				success: function(json) {
					loading('loading',false);
					if (json['data'].code === 1) {
						alert('Penyimpanan Data Berhasil');
						loadContent(base_url + 'view/_table_user');
					} else if(json['data'].code === 2){
						alert('Penyimpanan Data Tidak Berhasil');
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
			data: 'model-input=user&key-input=username&value-input=' + x,
			dataType: 'json',
			type: 'POST',
			cache: false,
			success: function(json) {
				if (json['data'].code === 1) {
					$("#username-input").val(json.data.object.username).attr("readonly","");
					$("#nama-input").val(json.data.object.nama);
					$("#email-input").val(json.data.object.email);
					$("#status-input").val(json.data.object.status);
					if (json.data.object.foto != '') {
						$("#div-foto").html('<img src="'+base_url+'asset/img/upload/'+json.data.object.foto+'" class="img img-thumbnail foto-profil">');
					}
					$("#action-input").val("2");
					$("#value-input").val(x);
					$("#div-upload").show();
				}
			}
		});
	}
</script>