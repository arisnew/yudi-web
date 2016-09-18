<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}
	
	public function index()
	{
		$this->load->view('user/form_user');
	}

	public function simpan()
	{
		if ($_POST) {
			//proses
			$data = array(
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);
			$eksekusi = $this->m_user->create_data($data);
			if ($eksekusi == TRUE) {
				echo '<script>alert("Simpan data berhasil"); window.location="index"</script>';
			} else {
				echo '<script>alert("Simpan data gagal"); window.location="index"</script>';
			}
		}
	}

	public function lists()
	{
		$dt['user'] = $this->m_user->read_data();
		$this->load->view('user/list_user',$dt);
	}
}
