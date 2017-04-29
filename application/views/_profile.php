<?php 
	$table = ($this->session->userdata('_LEVEL') == 'Admin') ? 'user' : strtolower($this->session->userdata('_LEVEL'));
	$key = ($table == 'user') ? 'username' : (($table == 'guru') ? 'nip' : 'nis');
	$me = $this->model->getRecord(array('table' => $table, 'where' => array($key => $this->session->userdata('_ID'))));
	if ($me != null) { ?>
		<div class="form-group">
			<section class="content">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">My Profile</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<dl class="dl-horizontal">
							<dt>ID : </dt>
							<dd><?php echo $this->session->userdata('_ID');?></dd>
							<dt>Nama : </dt>
							<dd><?php echo $me->nama;?></dd>
							<dt>Level : </dt>
							<dd><?php echo $me->level;?></dd>
						</dl>
					</div>
				</div>
			</section>
		</div>
	<?php
	}
?>
