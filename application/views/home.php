<?php
	$goTo = site_url('view/_dashboard');
	$data = array(
		'_TITLE'=>'E-SA',
		'_CONTENT'=>'',
		'_EXTRA_JS'=>'loadContent("' . $goTo . '");'
	);
	$this->load->view('template/index',$data);	//load main template
?>
