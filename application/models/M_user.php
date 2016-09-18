<?php
class M_user extends CI_Model {

	private $table_name;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		//koneksi
		$this->load->database();
		$this->table_name = 'user';
	}

	//untuk simpan data
	public function create_data($data)
	{
		$query = $this->db->insert($this->table_name, $data);
		return $query;
	}
}
?>