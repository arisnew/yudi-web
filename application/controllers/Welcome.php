<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	private $activeSession; // store session

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('template-public/index');
	}
	public function home() 
	{
		$this->load->view('template-public/index');
	}

	public function about()
	{
		$this->load->view('template-public/about');
	}
	public function berita()
	{
		$this->load->view('template-public/berita');
	}


	public function Kontak()
	{
		$this->load->view('template-public/contact');
	}

}


