<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tulis Pesan Baru</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="input-group">
                <input type="hidden" name="to-id" id="to-id" value="">
                <input type="text" class="form-control" id="to-input" name="to-input" placeholder="To: "/>
                <a href="#" id="btn-search-siswa" onclick="searchSiswa(); return false;" class="input-group-addon btn-primary" title="Cari Siswa"><span class="fa fa-search"></span></a>
            </div>
        </div>
        <div class="form-group">
            <input placeholder="Subject:" class="form-control" name="subject-input" id="subject-input" required="">
        </div>
        <div class="form-group">
            <textarea style="height: 300px; display: none;" class="form-control" id="compose-textarea"></textarea>
        </div>
        <div class="form-group">
            <div class="btn btn-default btn-file">
                <i class="fa fa-paperclip"></i> Attachment
                <input type="file" name="attachment">
            </div>
            <p class="help-block">Max. 32MB</p>
        </div>
    </div>

    <div class="box-footer">
        <div class="pull-right">
            <button class="btn btn-default" type="button"><i class="fa fa-pencil"></i> Draft</button>
            <button class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i> Send</button>
        </div>
        <button class="btn btn-default" type="reset" onclick="loadContent(base_url + 'view/_table_pesan_guru')"><i class="fa fa-times"></i> Discard</button>
    </div>
</div>
<input type="reset" value="Batal" onclick="loadContent(base_url + 'view/_table_pesan')">

<div id="modalPickSiswa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Siswa</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class="col-md-12">
                        <table id="table-siswa-picker" class="table table-bordered table-striped" cellspacing="0" >
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        //content
        $("#to-input").on("change", function () {
            siswaDetailByCode();
        });
    });

    // pop-up Siswa
    function searchSiswa() {
        if ($.fn.dataTable.isDataTable('#table-siswa-picker')) {
            tableProduk = $('#table-siswa-picker').DataTable();
        } else {
            tableProduk = $('#table-siswa-picker').DataTable({
                "ajax": base_url + 'pick/siswa/status/Aktif',
                "columns": [
                    {"data": "nis"},
                    {"data": "nama"},
                    {"data": "nama_kelas"},
                    {"data": "nama_jurusan"},
                    {"data": "aksi"}
                ],
                "ordering": true,
                "deferRender": true,
                "order": [[0, "asc"]],
                "fnDrawCallback": function (oSettings) {
                    $("#table-siswa-picker .pickBtn").on("click",function(){
                        $("#to-id").val($(this).attr('href').substring(1));
                        siswaDetail();
                        $("#modalPickSiswa").modal('hide');
                    });
                }
            });
        }

        $("#modalPickSiswa").modal();
    }

    function siswaDetail() {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=siswa&key-input=nis&value-input=' + $("#to-id").val(),
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json.data.code === 0) {
                    alert('Akses tidak sah');
                } else if (json.data.object != null) {
                    $("#to-input").val(json.data.object.nis);
                    $("#subject-input").focus();
                } else {
                    alert('Data siswa tidak valid!');
                    $("#to-input, #to-id").val("");
                    $("#to-input").focus();
                }
            }
        });
    }

    function siswaDetailByCode() {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=siswa&key-input=nis&value-input=' + $("#to-input").val(),
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json.data.code === 0) {
                    alert('Akses tidak sah');
                } else if (json.data.object != null) {
                    $("#to-id").val(json.data.object.nis);
                    $("#subject-input").focus();
                } else {
                    alert('Data siswa tidak valid!');
                    $("#to-id").val("");
                    $("#to-input").val("");
                    $("#to-input").focus();
                }
            }
        });
    }
</script>