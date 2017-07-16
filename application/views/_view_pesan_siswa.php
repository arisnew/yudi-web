<?php
if ($param != null) {
    $pesan = $this->model->getRecord(array('table' => 'pesan', 'where' => array('id_pesan' => $param)));
}
?>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $pesan->judul;?></h3>
            <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" type="button" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h2><?php echo $pesan->dari;?></h2>
                <h5><?php echo $pesan->ke;?> <span class="mailbox-read-time pull-right"><?php echo DateToIndo($pesan->tgl_post);?></span></h5>
            </div>
            <div class="mailbox-controls with-border text-center">
            </div>
            <div class="mailbox-read-message"><?php echo $pesan->isi;?>
            </div>
            
            <div class="box-footer box-comments">

            <div class="box-footer pull-right">
                <input type="reset" onclick="loadContent(base_url + 'view/_table_pesan_guru')" value="Kembali">
            </div>

        </div>
    </div>
</section>