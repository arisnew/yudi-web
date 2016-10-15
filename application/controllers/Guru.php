<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_guru');
	}
	
	public function index()
	{
		$data['_TITLE'] = 'Form_Guru';
		$data['_CONTENT'] = $this->load->view('guru/form_guru','', TRUE);
		$this->load->view('template/index', $data);
	}

	public function simpan()
	{
		if ($_POST) {
			//proses
			$data = array(
				'id_guru' => $this->input->post('id_guru'),
				'nama' => $this->input->post('nama'),
				'matapelajaran' => $this->input->post('matapelajaran'),
				'email' => $this->input->post('email')
				);
			$eksekusi = $this->m_guru->create_data($data);
			if ($eksekusi == TRUE) {
				echo '<script>alert("Simpan data berhasil"); window.location="lists"</script>';
			} else {
				echo '<script>alert("Simpan data gagal"); window.location="lists"</script>';
			}
		}
	}

	public function lists()
	{
		$dt['guru'] = $this->m_guru->read_data();
		$this->load->view('guru/list_guru',$dt);
	}

	public function edit($id = '')
	{
		//$id = $this->uri->segment(3);
		$dt['guru'] = $this->m_guru->get_data($id);
		$this->load->view('guru/edit_guru', $dt);
	}

	public function update()
	{
		if ($_POST) {
			//proses
			$data = array(
				'nama' => $this->input->post('nama'),
				'matapelajaran' => $this->input->post('matapelajaran'),
				'email' => $this->input->post('email')
				);
			$eksekusi = $this->m_guru->update_data($data, $this->input->post('id_guru'));
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
		$eksekusi = $this->m_guru->delete_data($id);
		if ($eksekusi == TRUE) {
			echo '<script>alert("Delete data berhasil"); window.location="'.base_url('guru/lists').'"</script>';
		} else {
			echo '<script>alert("Delete data gagal"); window.location="'.base_url('guru/lists').'"</script>';
		}
	}
}
