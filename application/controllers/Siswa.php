<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_siswa');
	}
	
	public function index()
	{
		$data['_TITLE'] = 'Form Siswa';
		$data['_CONTENT'] = $this->load->view('siswa/form_siswa','', TRUE);
		$this->load->view('template/index', $data);
	}

	public function simpan()
	{
		if ($_POST) {
			//proses
			$data = array(
				'nis' => $this->input->post('nis'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'kelas' => $this->input->post('kelas')
				);
			$eksekusi = $this->m_siswa->create_data($data);
			if ($eksekusi == TRUE) {
				echo '<script>alert("Simpan data berhasil"); window.location="lists"</script>';
			} else {
				echo '<script>alert("Simpan data gagal"); window.location="lists"</script>';
			}
		}
	}

	public function lists()
	{
		$dt['siswa'] = $this->m_siswa->read_data();
		$this->load->view('siswa/list_siswa',$dt);
	}

	public function edit($id = '')
	{
		//$id = $this->uri->segment(3);
		$dt['siswa'] = $this->m_siswa->get_data($id);
		$this->load->view('siswa/edit_siswa', $dt);
	}

	public function update()
	{
		if ($_POST) {
			//proses
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'kelas' => $this->input->post('kelas')
				);
			$eksekusi = $this->m_siswa->update_data($data, $this->input->post('nis'));
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
		$eksekusi = $this->m_siswa->delete_data($id);
		if ($eksekusi == TRUE) {
			echo '<script>alert("Delete data berhasil"); window.location="'.base_url('siswa/lists').'"</script>';
		} else {
			echo '<script>alert("Delete data gagal"); window.location="'.base_url('siswa/lists').'"</script>';
		}
	}
}
