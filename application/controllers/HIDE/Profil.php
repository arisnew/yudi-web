<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	
	public function index()
	{
		$this->load->view('berita');
	}

	public function about()
	{
		$this->load->view('materi');
	}
	public function pendaftaran()
	{
		$this->load->view('pendaftaran');
	}

}
