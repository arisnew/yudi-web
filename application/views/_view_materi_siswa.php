<?php
if ($param != null) {
    $materi = $this->model->getRecord(array('table' => 'v_materi', 'where' => array('id_materi' => $param)));
}
if ($param != null) {
  $lampiran = $this->model->getList(array('table' => 'v_lampiran', 'where' => array('id_materi' => $param)));
}
?>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $materi->nama_mapel;?></h3>
            <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" type="button" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h2><?php echo $materi->judul;?></h2>
                <h5><?php echo $materi->nama;?> <span class="mailbox-read-time pull-right"><?php echo DateToIndo($materi->tgl_posting);?></span></h5>
            </div>
            <div class="mailbox-controls with-border text-center"></div>
            <div class="mailbox-read-message"><?php echo $materi->isi;?></div>
            <?php
            if ($lampiran) {
                foreach ($lampiran as $row) {
                    ?>
                    <div class="mailbox-attachment-info">
                        <a class="mailbox-attachment-name" href="<?php echo base_url('asset/files/' . $row->nama_file);?>"><i class="fa fa-paperclip"></i> <?php echo $row->nama_file;?></a>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="box-footer box-comments">
                <?php
                $komentars = $this->model->getList(array('table' => 'komentar', 'where' => array('id_materi' => $param)));
                if ($komentars) {
                    foreach ($komentars as $row) {
                        if ($row->level_komentator == 'siswa') {
                            $id = 'nis';
                        } elseif ($row->level_komentator == 'guru') {
                            $id = 'nip';
                        }
                        //siapa?
                        $profil = $this->model->getRecord(array('table' => $row->level_komentator, 'where' => array($id => $row->komentator)));
                        if ($profil) {
                            ?>
                            <div class="box-comment">
                                <img alt="User Image" src="<?php echo base_url('asset/img/upload/' . $profil->foto);?>" class="img-circle img-sm">
                                <div class="comment-text">
                                    <span class="username">
                                        <?php echo $profil->nama;?>
                                    </span>
                                    <span class="text-muted pull-right"><?php echo DateToIndo($row->tgl_post);?></span>
                                    <?php echo $row->isi;?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="box-footer">
                <form id="form-comment">
                    <img alt="Alt Text" src="<?php echo base_url('asset/img/upload/' . $this->session->userdata('_IMG'));?>" class="img-responsive img-circle img-sm">
                    <div class="img-push">
                        <input type="hidden" name="model-input" id="model-input" value="komentar">
                        <input type="hidden" name="key-input" id="key-input" value="id_komentar">
                        <input type="hidden" name="action-input" id="action-input" value="1">
                        <input type="hidden" name="value-input" id="value-input" value="0">
                        <input type="hidden" name="materi-input" id="materi-input" value="<?php echo $param;?>">
                        <input type="hidden" name="level-input" id="level-input" value="siswa">
                        <input type="text" name="msg-input" id="msg-input" placeholder="Press enter to post comment" class="form-control input-sm">
                        <input type="submit" name="kirim" id="kirim" style="display: none;" onclick="kirimKomentar(); return false;">
                    </div>
                </form>
            </div>
            <div class="box-footer pull-right">
                <input type="reset" onclick="loadContent(base_url + 'view/_table_materi_siswa')" value="Kembali">
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        //here
    });

    function kirimKomentar() {
        loading("loading", true);
        setTimeout(function () {
            $.ajax({
                url: base_url + 'manage',
                type: 'POST',
                dataType: "json",
                data: $("#form-comment").serialize(),
                cache: false,
                success: function (json) {
                    loading("loading", false);
                    if (json.data.code == 1) {
                        alert("Komentar berhasil di kirim.");
                        loadContent(base_url + 'view/_view_materi_siswa/<?php echo $param;?>');
                    } else if(json.data.code == 2) {
                        alert("Komentar gagal!");
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
</script>