<?php

if ($param != null) {
	$materi = $this->model->getRecord(array('table' => 'v_materi', 'where' => array('id_materi' => $param)));
}
if ($param != null) {
  $lampiran = $this->model->getRecord(array('table' => 'v_lampiran', 'where' => array('id_lampiran' => $param)));
}
?>

<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $materi->nama_mapel;?></h3>
      <div class="box-tools pull-right">
        <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" type="button" data-original-title="Collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body no-padding">
      <div class="mailbox-read-info">
        <h2><?php echo $materi->judul;?></h2>
        <h5><?php echo $materi->nama;?> 
          <span class="mailbox-read-time pull-right"><?php echo $materi->tgl_posting;?></span>
        </h5>
      </div>
      <div class="mailbox-controls with-border text-center">
      </div>
      <div class="mailbox-read-message">
        <?php echo $materi->isi;?>
      </div>
      <div class="mailbox-attachment-info">
        <a class="mailbox-attachment-name" href="#"><i class="fa fa-paperclip"></i><?php echo $lampiran->nama_file;?></a>
        <span class="mailbox-attachment-size">
          <a class="btn btn-default btn-xs pull-right" href="#"><i class="fa fa-cloud-download"></i></a>
        </span>
      </div>
      <!-- /.box-body -->
      <div class="box-footer pull-right">
        <input type="reset" onclick="loadContent(base_url + 'view/_table_materi')" value="Kembali">
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
  <!-- /.box -->
</section>
