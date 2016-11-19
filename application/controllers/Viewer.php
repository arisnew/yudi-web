<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewer extends CI_Controller {
	private $activeSession; // store session

	public function __construct() {
	    parent::__construct();
	    $this->activeSession = $this->session->userdata('_USER_ID');
	}

	public function index() {
		if ($this->activeSession == null) {
			$this->load->view('login');
		} else {
			redirect(site_url('view/home'));
		}
	}

	/*
	*	url routing with rules:
	*	- default: home
	*	- collaborate with CI Route
	*/
	public function pathGuide($page = 'home', $param = null) {
		if ($this->activeSession == null) {
			//$this->output->set_output('');
			//$this->load->view('redirect');
			$this->load->view('login');
		} else {
			$this->load->view($page, array('param' => $param));
		}
	}
}
