<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retriever extends CI_Controller {
	private $activeSession; // store session

	public function __construct() {
		parent::__construct();
		$this->activeSession = $this->session->userdata('_USER_ID');
	}

	public function index() {
		redirect(site_url('view/home'));
	}

	/*
	* read object
	*/
	public function record($specific = null) {
		/*
		* code info:
		*	- 0 = akses tidak sah & data tidak perlu di tampilkan
		*	- 1 = akses sah & data di tampilkan
		*/
		$code = 0;
		$object = null;

		if ($this->activeSession != null) {
			$query['table'] = $this->input->post('model-input');
			$query['where'] = array($this->input->post('key-input') => $this->input->post('value-input'));
			$object = $this->model->getRecord($query);
			$code = 1;
		}

		echo json_encode(array('data' => array(
			'code' => $code,
			'object' => $object
			)));
	}

	/* |||||||||||||||||||||||||||||||||||| DATATABLES |||||||||||||||||||||||||||||||||||| */
	/*
	* read objects - DataTables
	*/
	public function records($table, $key = 'null', $value = 'null', $picker = 'no') {
		$data = array();

		if ($this->activeSession != null) {
			if (isset($table)) {
				if ($key != 'null' && $value != 'null') {
					$query['where'] = array($key => $value);
				}
				
				$query['table'] = $table;

				$records = $this->model->getList($query);
				$inner = '_' . $table;
				$data = self::$inner($records, $picker);
			}
		}

		echo json_encode(array('data' => $data));
	}

	/*
	* inner data generator
	*/
	private function _user($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->username . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				//$linkBtn = '<a href="#' . $record->username . '" class="btn btn-xs btn-warning privilegeBtn"><i class="fa fa-shield"></i> Privilege</a>';
				$linkBtn = ' <a href="#' . $record->username . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->username . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'username' => $record->username,
				'nama' => $record->nama,
				'email' => $record->email,
				'status' => $record->status,
				'aksi' => $linkBtn
				);
		}
		return $data;
	}

	private function _guru($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->nip . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				$linkBtn = ' <a href="#' . $record->nip . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->nip . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'nip'			=> $record->nip,
				'nama' 			=> $record->nama,
				'alamat' 		=> $record->alamat,
				'tempat_lahir' 	=> $record->tempat_lahir,
				'jenis_kelamin' => $record->jenis_kelamin,
				'agama' 		=> $record->agama,
				'no_telp'		=> $record->no_telp,
				'email'			=> $record->email,
				'status_pegawai'=> $record->status_pegawai,
				'username' 		=> $record->username,
				'status' 		=> $record->status,
				'aksi' 			=> $linkBtn
				);
		}
		return $data;
	}

	private function _siswa($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->nis . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				//$linkBtn = '<a href="#' . $record->nis . '" class="btn btn-xs btn-warning privilegeBtn"><i class="fa fa-shield"></i> Privilege</a>';
				$linkBtn = ' <a href="#' . $record->nis . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->nis . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'nis' => $record->nis,
				'nama' => $record->nama,
				'alamat' => $record->alamat,
				'kelas' => $record->kelas,
				'aksi' => $linkBtn
				);
		}
		return $data;
	}
}
