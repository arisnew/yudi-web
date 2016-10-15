<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}
	
	public function index()
	{
		$data['_TITLE'] = 'Form User';
		$data['_CONTENT'] = $this->load->view('user_ajax/form_user','', TRUE);
		$this->load->view('template/index', $data);
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
				echo '<script>alert("Simpan data berhasil"); window.location="lists"</script>';
			} else {
				echo '<script>alert("Simpan data gagal"); window.location="lists"</script>';
			}
		}
	}

	public function lists()
	{
		$dt['user'] = $this->m_user->read_data();
		$this->load->view('user_ajax/list_user',$dt);
	}

	public function edit($id = '')
	{
		//$id = $this->uri->segment(3);
		$dt['user'] = $this->m_user->get_data($id);
		$this->load->view('user_ajax/edit_user', $dt);
	}

	public function update()
	{
		if ($_POST) {
			//proses
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);
			$eksekusi = $this->m_user->update_data($data, $this->input->post('username'));
			if ($eksekusi == TRUE) {
				echo '<script>alert("Update data berhasil"); window.location="lists"</script>';
			} else {
				echo '<script>alert("Update data gagal"); window.location="lists"</script>';
			}
		}
	}

	public function delete($id = '')
	{
		//$id = $this->uri->segment(3);
		$eksekusi = $this->m_user->delete_data($id);
		if ($eksekusi == TRUE) {
			echo '<script>alert("Delete data berhasil"); window.location="'.base_url('user_ajax/lists').'"</script>';
		} else {
			echo '<script>alert("Delete data gagal"); window.location="'.base_url('user_ajax/lists').'"</script>';
		}
	}
}
