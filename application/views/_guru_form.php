<div class="form-group">
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form guru</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box box-body">
						<div id="loading"></div>
						<form id="form-guru" class="form-horizontal">
							<div class="form-group">
								<label for="nip-input" class="col-sm-2 control-label">Nip</label>
								<div class="col-sm-10">
									<input class="form-control" name="nip-input" id="nip-input" placeholder="NIP" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="nama-input" class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-10">
									<input class="form-control" name="nama-input" id="nama-input" placeholder="Nama" type="text">
								</div>
							</div>

							<div class="form-group">
								<label for="alamat-input" class="col-sm-2 control-label">Alamat</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="alamat-input" id="alamat-input" placeholder="Alamat" type="text"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="tempat_lahir-input" class="col-sm-2 control-label">Tempat_lahir</label>
								<div class="col-sm-10">
									<input class="form-control" name="tempat_lahir-input" id="tempat_lahir-input" placeholder="Tempat Lahir" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="tgl_lahir-input" class="col-sm-2 control-label">Tanggal Lahir</label>
								<div class="col-sm-10">
									<input class="form-control datepicker2" name="tgl_lahir-input" id="tgl_lahir-input" placeholder="yyyy-mm-dd" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="jenis_kelamin-input" class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-10">								
									<select class="form-control" name="jenis_kelamin-input" id="jenis_kelamin-input">
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="agama-input" class="col-sm-2 control-label">Agama</label>
								<div class="col-sm-10">								
									<select class="form-control" name="agama-input" id="agama-input">
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="no_telp-input" class="col-sm-2 control-label">Nomer Telpon</label>
								<div class="col-sm-10">
									<input class="form-control" name="no_telp-input" id="no_telp-input" placeholder="No.Tlpn/HP" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="email-input" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input class="form-control" name="email-input" id="email-input" placeholder="Email" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="status_pegawai-input" class="col-sm-2 control-label">Status Pegawai</label>
								<div class="col-sm-10">								
									<select class="form-control" name="status_pegawai-input" id="status_pegawai-input">
										<option value="Tetap">Tetap</option>
										<option value="Kontrak">Kontrak</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="username-input" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<input class="form-control" name="username-input" id="username-input" placeholder="Username" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="password-input" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input class="form-control" name="password-input" id="password-input" placeholder="Password" type="text">
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
							<div id="div-foto"></div>
							<div id="div-upload" style="display: none">
								<label>Foto</label>
								<input type="file" name="file_upload" id="file_upload" class="image" >
							</div>
							<input type="hidden" name="model-input" id="model-input" value="guru">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="nip">
							<input type="hidden" name="value-input" id="value-input" value="0">

							<button class="btn btn-primary" type="submit" onclick="proses_simpan(); return false;"><i class="fa fa-save"></i> Simpan</button>
							<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_guru')">
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
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				<?php
				if ($param) {
					echo 'fillForm("'.$param.'");';
				}
				?>

				$(".datepicker2").datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function(e){
					$(this).datepicker('hide');
				});

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
			            		model:'guru',
			            		key: 'nip',
			            		value:$("#form-guru #nip-input").val()
			            	};
			            }
			        });

			        //refresh if succes upload...
			        $('#file_upload').on('filebatchuploadcomplete', function(event, files, extra) {
			        	loadContent(base_url + "view/_guru_form/" + $("#nip-input").val());
			        });
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
		}, 100);
			}

			function fillForm(x) {
				$.ajax({
					url: base_url + 'object',
					data: 'model-input=guru&key-input=nip&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#nip-input").val(json.data.object.nip).attr("readonly","");
							$("#nama-input").val(json.data.object.nama);
							$("#alamat-input").val(json.data.object.alamat);
							$("#tempat_lahir-input").val(json.data.object.tempat_lahir);
							$("#tgl_lahir-input").val(json.data.object.tgl_lahir);
							$("#jenis_kelamin-input").val(json.data.object.jenis_kelamin);
							$("#agama-input").val(json.data.object.agama);
							$("#no_telp-input").val(json.data.object.no_telp);
							$("#email-input").val(json.data.object.email);
							$("#status_pegawai-input").val(json.data.object.status_pegawai);
							$("#username-input").val(json.data.object.username).attr("readonly","");
							$("#password-input").val(json.data.object.password);
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