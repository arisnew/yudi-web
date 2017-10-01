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
					//multi conditional
					$keys = explode('__', $key);
					$vals = explode('__', $value);
					if (count($keys) == 3 && count($vals) == 3) {
						$query['where'] = array($keys[0] => $vals[0], $keys[1] => $vals[1], $keys[2] => $vals[2]);
					} elseif (count($keys) == 2 && count($vals) == 2) {
						$query['where'] = array($keys[0] => $vals[0], $keys[1] => $vals[1]);
					} else {
						$query['where'] = array($key => $value);
					}
				}

				switch ($table) {
					case 'materi':
						$query['table'] = 'v_materi';	//use view
						break;

					case 'soal':
						$query['table'] = 'v_soal';	//use view
						break;

					case 'siswa':
						$query['table'] = 'v_siswa';	//use view
						break;
					
					case 'nilai_ujian':
						$query['table'] = 'v_nilai_ujian';	//use view
						break;
				
					case 'lampiran':
						$query['table'] = 'v_lampiran';	//use view
						break;
			
					case 'komentar':
						$query['table'] = 'v_komentar';	//use view
						break;
		
					case 'jadwal':
						$query['table'] = 'v_jadwal';	//use view
						break;
		
						default:
						$query['table'] = $table;
						break;
					}

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
				'username' 	=> $record->username,
				'nama' 		=> $record->nama,
				'email' 	=> $record->email,
				'status' 	=> $record->status,
				'aksi' 		=> $linkBtn
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
				'nis' 			=> $record->nis,
				'nama'			=> $record->nama,
				'alamat' 		=> $record->alamat,
				'tempat_lahir' 	=> $record->tempat_lahir,
				'jenis_kelamin' => $record->jenis_kelamin,
				'agama' 		=> $record->agama,
				'thn_masuk'		=> $record->thn_masuk,
				'email'			=> $record->email,
				'no_telp'		=> $record->no_telp,
				'username' 		=> $record->username,
				'kelas' 		=> $record->kelas,
				'nama_kelas'	=> $record->nama_kelas,
				'jurusan' 		=> $record->jurusan,
				'nama_jurusan'	=> $record->nama_jurusan,
				'foto'			=> $record->foto,
				'status' 		=> $record->status,
				'aksi' 			=> $linkBtn
				);
		}
		return $data;
	}
	
	private function _kelas($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->kode_kelas . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				//$linkBtn = '<a href="#' . $record->kode_kelas . '" class="btn btn-xs btn-warning privilegeBtn"><i class="fa fa-shield"></i> Privilege</a>';
				$linkBtn = ' <a href="#' . $record->kode_kelas . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->kode_kelas . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'kode_kelas' => $record->kode_kelas,
				'nama_kelas' => $record->nama_kelas,
				'status'	 => $record->status,
				'aksi'		 => $linkBtn
				);
		}
		return $data;
	}

	private function _jurusan($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->kode_jurusan . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				$linkBtn = ' <a href="#' . $record->kode_jurusan . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->kode_jurusan . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'kode_jurusan' 	=> $record->kode_jurusan,
				'nama_jurusan' 	=> $record->nama_jurusan,
				'status' 		=> $record->status,
				'aksi' 			=> $linkBtn
				);
		}
		return $data;
	}

	private function _mata_pelajaran($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->kode_mapel . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				$linkBtn = ' <a href="#' . $record->kode_mapel . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->kode_mapel . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'kode_mapel' 	=> $record->kode_mapel,
				'nama_mapel' 	=> $record->nama_mapel,
				'status' 		=> $record->status,
				'aksi' 			=> $linkBtn
				);
		}
		return $data;
	}

	private function _jadwal($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->id_jadwal . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				$linkBtn = ' <a href="#' . $record->id_jadwal . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->id_jadwal . '" class="btn btn-xs btn-warning readBtn"><i class="fa fa-book"></i> Tambah Materi</a>';
				$linkBtn .= ' <a href="#' . $record->id_jadwal . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'id_jadwal'		=> $record->id_jadwal,
				'kode_mapel' 	=> $record->kode_mapel,
				'nama_mapel' 	=> $record->nama_mapel,
				'nip'			=> $record->nip,
				'nama' 			=> $record->nama,
				'kode_kelas' 	=> $record->kode_kelas,
				'nama_kelas' 	=> $record->nama_kelas,
				'kode_jurusan' 	=> $record->kode_jurusan,
				'nama_jurusan' 	=> $record->nama_jurusan,
				'hari' 			=> $record->hari,
				'jam' 			=> $record->jam,
				'status'		=> $record->status,
				'aksi'		 	=> $linkBtn
				);
		}
		return $data;
	}

	private function _materi($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->id_materi . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				$linkBtn = ' <a href="#' . $record->id_materi . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->id_materi . '" class="btn btn-xs btn-info writeBtn"><i class="fa fa-book"></i> Tambah Soal</a>';
				$linkBtn .= ' <a href="#' . $record->id_materi . '" class="btn btn-xs btn-warning readBtn"><i class="fa fa-book"></i> Lihat Materi</a>';
				$linkBtn .= ' <a href="#' . $record->id_materi . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'id_materi'		=> $record->id_materi,
				'id_jadwal'		=> $record->id_jadwal,
				'kode_mapel' 	=> $record->kode_mapel,
				'nama_mapel' 	=> $record->nama_mapel,
				'judul'			=> $record->judul,
				'isi' 			=> $record->isi,
				'nip' 			=> $record->nip,
				'nama' 			=> $record->nama,
				'tgl_posting' 	=> $record->tgl_posting,
				'publish'	 	=> $record->publish,
				'aksi'		 	=> $linkBtn
				);
		}
		return $data;
	}

	private function _nilai_ujian($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->id_nilai . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				$linkBtn = ' <a href="#' . $record->id_nilai . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->id_nilai . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'id_nilai' 		=> $record->id_nilai,
				'nis' 			=> $record->nis,
				'nama' 			=> $record->nama,
				'jumlah_benar' 	=> $record->jumlah_benar,
				'jumlah_salah' 	=> $record->jumlah_salah,
				'tgl_ujian' 	=> $record->tgl_ujian,
				'nilai' 		=> $record->nilai,
				'aksi' 			=> $linkBtn
				);
		}
		return $data;
	}

	private function _soal($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->id_soal . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				$linkBtn = ' <a href="#' . $record->id_soal . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->id_soal . '" class="btn btn-xs btn-warning readBtn"><i class="fa fa-eye"></i> Lihat</a>';
				$linkBtn .= ' <a href="#' . $record->id_soal . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'id_soal' 		=> $record->id_soal,
				'id_materi' 	=> $record->id_materi,
				'judul' 		=> $record->judul,
				'pertanyaan' 	=> $record->pertanyaan,
				'opsi_a' 		=> $record->opsi_a,
				'opsi_b' 		=> $record->opsi_b,
				'opsi_c' 		=> $record->opsi_c,
				'opsi_d' 		=> $record->opsi_d,
				'jawaban'		=> $record->jawaban,
				'nip' 			=> $record->nip,
				'nama'			=> $record->nama,
				'tgl_posting' 	=> $record->tgl_posting,
				'durasi'		=> $record->durasi,
				'aksi' 			=> $linkBtn
				);
		}
		return $data;
	}

	private function _lampiran($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->id_lampiran . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				//$linkBtn = '<a href="#' . $record->kode_kelas . '" class="btn btn-xs btn-warning privilegeBtn"><i class="fa fa-shield"></i> Privilege</a>';
				$linkBtn = ' <a href="#' . $record->id_lampiran . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->id_lampiran . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'id_lampiran'	=> $record->id_lampiran,
				'id_materi' 	=> $record->id_materi,
				'judul'			=> $record->judul,
				'nama_lampiran'	=> $record->nama_lampiran,
				'nama_file' 	=> $record->nama_file,
				'aksi'			=> $linkBtn
				);
		}
		return $data;
	}

	private function _komentar($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->id_komentar . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				//$linkBtn = '<a href="#' . $record->kode_kelas . '" class="btn btn-xs btn-warning privilegeBtn"><i class="fa fa-shield"></i> Privilege</a>';
				$linkBtn = ' <a href="#' . $record->id_komentar . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->id_komentar . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'id_komentar'		=> $record->id_komentar,
				'id_materi' 		=> $record->id_materi,
				'judul'				=> $record->judul,
				'komentator'		=> $record->komentator,
				'level_komentator'	=> $record->level_komentator,
				'isi'				=> $record->isi,
				'tgl_post'			=> $record->tgl_post,
				'aksi'		 		=> $linkBtn
				);
		}
		return $data;
	}

	private function _pesan($records, $picker = 'no') {
		$data = array();

		foreach ($records as $record) {
			if ($picker == 'yes') {
				$linkBtn = ' <a href="#' . $record->id_pesan . '" class="btn btn-xs btn-primary pickBtn"><i class="fa fa-thumb-tack" ></i> Pilih</a>';
			} elseif ($picker == 'no') {
				//$linkBtn = '<a href="#' . $record->kode_kelas . '" class="btn btn-xs btn-warning privilegeBtn"><i class="fa fa-shield"></i> Privilege</a>';
				$linkBtn = ' <a href="#' . $record->id_pesan . '" class="btn btn-xs btn-primary editBtn"><i class="fa fa-edit"></i> Edit</a>';
				$linkBtn .= ' <a href="#' . $record->id_pesan . '" class="btn btn-xs btn-warning readBtn"><i class="fa fa-eye"></i> Read</a>';
				$linkBtn .= ' <a href="#' . $record->id_pesan . '" class="btn btn-xs btn-danger removeBtn"><i class="fa fa-trash-o"></i> Delete</a>';
			}
			
			$data[] = array(
				'id_pesan'	=> $record->id_pesan,
				'judul' 	=> $record->judul,
				'isi'		=> $record->isi,
				'dari'		=> $record->dari,
				'ke'		=> $record->ke,
				'type_pesan'=> $record->type_pesan,
				'tgl_post'	=> $record->tgl_post,
				'aksi'		=> $linkBtn
				);
		}
		return $data;
	}

	/*
	* get data materi by id_mapel
	* return string '<option value=""></option>'
	*/

	public function get_mapel_by_guru($nip = null)
	{
		$result = '';
		if ($nip != null) {
			$data_mata_pelajaran = $this->model->getList(array('table' => 'v_materi', 'where' => array('nip' => $nip)));
			if ($data_mata_pelajaran) {
				foreach ($data_mata_pelajaran as $row) {
					$result .= '<option value="'.$row->kode_mapel.'">'.$row->nama_mapel.'</option>';
				}
			}
		}

		echo $result;
	}

	public function get_materi_by_mapel($kode_mapel = null)
	{
		$result = '';
		if ($kode_mapel != null) {
			$data_materi = $this->model->getList(array('table' => 'v_materi', 'where' => array('kode_mapel' => $kode_mapel)));
			if ($data_materi) {
				foreach ($data_materi as $row) {
					$result .= '<option value="'.$row->id_materi.'">'.$row->judul.'</option>';
				}
			}
		}

		echo $result;
	}

	public function get_materi_by_jadwal($id_jadwal = null)
	{
		$result = '';
		if ($id_jadwal != null) {
			$data_materi = $this->model->getList(array('table' => 'v_materi', 'where' => array('id_jadwal' => $id_jadwal)));
			if ($data_materi) {
				foreach ($data_materi as $row) {
					$result .= '<option value="'.$row->id_materi.'">'.$row->judul.'</option>';
				}
			}
		}

		echo $result;
	}
}
