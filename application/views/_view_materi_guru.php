<?php
if ($param != null) {
	$materi = $this->model->getRecord(array('table' => 'v_materi', 'where' => array('id_materi' => $param)));
}
if ($param != null) {
  $lampiran = $this->model->getList(array('table' => 'v_lampiran', 'where' => array('id_materi' => $param)));
}
?>

<section class="content">
    <!-- Default box -->
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
            <div class="mailbox-controls with-border text-center">
            </div>

            <div class="mailbox-read-message"><?php echo $materi->isi;?>
            </div>
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
        <div class="box-comment">
            <!-- User image -->
            <img alt="User Image" src="../dist/img/user3-128x128.jpg" class="img-circle img-sm">

            <div class="comment-text">
                <span class="username">
                    Maria Gonzales
                    <span class="text-muted pull-right">8:03 PM Today</span>
                </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
            </div>
            <!-- /.comment-text -->
        </div>
        <!-- /.box-comment -->
        <div class="box-comment">
            <!-- User image -->
            <img alt="User Image" src="../dist/img/user4-128x128.jpg" class="img-circle img-sm">

            <div class="comment-text">
                <span class="username">
                    Luna Stark
                    <span class="text-muted pull-right">8:03 PM Today</span>
                </span><!-- /.username -->
            It is a long established fact that a reader will be distracted
            by the readable content of a page when looking at its layout.
            </div>
        <!-- /.comment-text -->
        </div>
            <!-- /.box-comment -->
    </div>
    <div class="box-footer">
      <form method="post" action="#">
        <img alt="Alt Text" src="../dist/img/user4-128x128.jpg" class="img-responsive img-circle img-sm">
        <!-- .img-push is used to add margin to elements next to floating images -->
        <div class="img-push">
          <input type="text" placeholder="Press enter to post comment" class="form-control input-sm">
      </div>
  </form>
</div>
<!-- /.box-body -->
<div class="box-footer pull-right">
    <input type="reset" onclick="loadContent(base_url + 'view/_table_materi_guru')" value="Kembali">
</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->
</div>
</section>
