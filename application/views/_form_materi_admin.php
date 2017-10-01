<?php
//harus ada param
//jika edit tambahkan pemisah __
//contoh 1__2 maka edit, jika cuma 1 maka insert
$edit = false;
$id_jadwal = 0;
if ($param) {
	$params = explode("__", $param);
	if (count($params) == 2) {
		//maka edit
		$edit = true;
		$id_materi = $params[1];
		$materi = $this->model->getRecord(array('table' => 'v_materi', 'where' => array('id_materi' => $id_materi)));
		if ($materi) {
			$id_jadwal = $materi->id_jadwal;
		}
	} else {
		//maka insert
		$id_jadwal = $param;
	}
	
	$jadwal = $this->model->getRecord(array('table' => 'v_jadwal', 'where' => array('id_jadwal' => $id_jadwal)));
	if ($jadwal) {

		?>
		<div class="form-group">
			<section class="content">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Form Materi</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div id="loading"></div>
						<form id="form-materi" class="form-horizontal">
							<input type="hidden" name="id_jadwal" id="id_jadwal" value="<?php echo $jadwal->id_jadwal;?>">
							<div class="form-group">
								<label for="mata_pelajaran-input" class="col-sm-2 control-label">Mata Pelajaran</label>
								<div class="col-sm-10">
									<input type =" text" value="<?php echo $jadwal->nama_mapel;?>" class="form-control" name="mata_pelajaran-input" id="mata_pelajaran-input" >
								</div>
							</div>
							<div class="form-group">
								<label for="guru-input" class="col-sm-2 control-label">Nama Guru</label>
								<div class="col-sm-10">
									<input type ="text" value="<?php echo $jadwal->nama;?>" class="form-control" name="nama_guru-input" id="nama_guru-input" >
									<input type ="hidden" value="<?php echo $jadwal->nip;?>" class="form-control" name="guru-input" id="guru-input" >
								</div>
							</div>
							<div class="form-group">
								<label for="judul-input" class="col-sm-2 control-label">Judul</label>
								<div class="col-sm-10">
									<input class="form-control" name="judul-input" id="judul-input" placeholder="Judul" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="isi-input" class="col-sm-2 control-label">Isi</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="isi-input" id="isi-input" placeholder="Isi" type="text"></textarea>
								</div>
							</div>							
							<div class="form-group">
								<label for="tgl_posting-input" class="col-sm-2 control-label">Tanggal Posting</label>
								<div class="col-sm-10">
									<input class="form-control datepicker2" name="tgl_posting-input" id="tgl_posting-input" placeholder="yyyy-mm-dd" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="publish-input" class="col-sm-2 control-label">Publish</label>
								<div class="col-sm-10">								
									<select class="form-control" name="publish-input" id="publish-input">
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>
							<div id="div-file" style="display: none">
								<h3>Lampiran</h3>
								<table id="table-lampiran" class="table table-striped table-condensed">
									<thead>
										<tr>
											<th>Nama File</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div id="div-upload" style="display: none">
								<hr>
								<label>File Lampiran</label>
								<input type="file" name="file_upload" id="file_upload" class="file" accept="*" >
							</div>
							<input type="hidden" name="model-input" id="model-input" value="materi">
							<input type="hidden" name="action-input" id="action-input" value="1">
							<input type="hidden" name="key-input" id="key-input" value="id_materi">
							<input type="hidden" name="value-input" id="value-input" value="0">
							<div class="box-footer">
								<button class="btn btn-primary" type="submit" onclick="simpan_data(); return false;"><i class="fa fa-save"></i> Simpan</button>
								<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_jadwal')">
							</div>
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
					echo '$("#div-upload, #div-file").show();';
					echo 'getDataLampiran();';
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
				            uploadUrl: "<?php echo base_url('doupload_materi'); ?>", // your upload server url
				            msgFilesTooMany: 'Jumlah berkas yang akan diunggah ({n}) melebihi batas jumlah yang sudah ditentukan ({m}). Coba ulangi proses unggah berkas!',
				            msgLoading: 'Memproses berkas {index} dari {files} …',
				            msgProgress: 'Memproses berkas {index} dari {files} - {name} - {percent}% selesai.',
				            uploadExtraData: function() {
				            	return {
				            		nama_field:'file_upload',
				            		model:'lampiran',
				            		key: 'materi_id',
				            		value:$("#form-materi #value-input").val()
				            	};
				            }
				        });

				        //refresh if succes upload...
				        $('#file_upload').on('filebatchuploadcomplete', function(event, files, extra) {
				        	loadContent(base_url + "view/_form_materi_admin/" + $("#value-input").val());
				        });

				        $(".datepicker2").datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function(e){
				        	$(this).datepicker('hide');
				        });

				        CKEDITOR.replace('isi-input');

				    });

			function simpan_data() {
				loading('loading', true);
				CKupdate();
				setTimeout(function() {
					$.ajax({
						url: base_url + 'manage',
						data: $("#form-materi").serialize(),
						dataType: 'json',
						type: 'POST',
						cache: false,
						success: function(json) {
							loading('loading',false);
							if (json['data'].code === 1) {
								alert('Penyimpanan data berhasil');
								loadContent(base_url + 'view/_table_materi');
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
					data: 'model-input=materi&key-input=id_materi&value-input=' + x,
					dataType: 'json',
					type: 'POST',
					cache: false,
					success: function(json) {
						if (json['data'].code === 1) {
							$("#id_materi-input").val(json.data.object.id_materi).attr("readonly","");
							$("#id_jadwal").val(json.data.object.id_jadwal);
							$("#judul-input").val(json.data.object.judul);
							$("#isi-input").val(json.data.object.isi);
							$("#guru-input").val(json.data.object.nip);
							$("#nama_guru-input").val(json.data.object.nama);
							$("#tgl_posting-input").val(json.data.object.tgl_posting);
							$("#publish-input").val(json.data.object.publish);
							$("#action-input").val("2");
							$("#value-input").val(x);
									//lanjut ntr
								}
							}
						});
			}

			function getDataLampiran() {
				if ($.fn.dataTable.isDataTable('#table-lampiran')) {
					tableLampiran = $('#table-lampiran').DataTable();
				} else {
					tableLampiran = $('#table-lampiran').DataTable({
						"ajax": base_url + 'objects/lampiran/id_materi/<?php echo $param;?>',
						"columns": [
						{"data": "nama_file"},
						{"data": "aksi"}
						],
						"ordering": true,
						"deferRender": true,
						"order": [[0, "asc"]],
						"fnDrawCallback": function (oSettings) {
							utilsLampiran();
						}
					});
				}
			}

			function utilsLampiran() {
				$("#table-lampiran .editBtn").on("click",function(){
		                    //loadContent(base_url + 'view/_lampiran_form/' + $(this).attr('href').substring(1));
		                });

				$("#table-lampiran .removeBtn").on("click",function(){
		                   // konfirmasiHapus($(this).attr('href').substring(1));
		               });
			}
		</script>
		<?php
	}
}
?>
