<?php
	$goTo = site_url('view/_dashboard');
	$data = array(
		'_TITLE'=>'Dashboard',
		'_CONTENT'=>'<div id="dinamic-content"></div>',
		'_EXTRA_JS'=>'loadContent("' . $goTo . '");'
	);
	$this->load->view('template/index',$data);	//load main template
?>
