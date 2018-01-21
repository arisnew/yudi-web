<div class="row col-md-12">
	<div class="panel panel-info">
		<div class="panel-heading">Selesai ujian</div>
		<div class="panel-body">
			<button id="selesai-btn" class="btn btn-primary pull-left" onclick="proses_selesai(); return false;">Selesai</button>
		</div>
	</div>
</div>

<script type="text/javascript">

function proses_selesai(callback) {
        loading('loading', true);
        $.ajax({
            url: base_url + 'akhiri_tes/<?php echo $param;?>',
            data: 'id=1',
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                loading('loading',false);
                if (json.code === 1) {
                    alert('Tes telah berakhir');
                    loadContent(base_url + 'view/tabel_nilai_siswa');
                } else{
                    alert('An Error has occured');
                }

                if (typeof callback == 'function') {
                    callback();
                }
            },
            error: function () {
                loading('loading',false);
                alert('An error accurred');
            }
        });
    }

</script>