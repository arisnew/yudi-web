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

	public function read_data()
	{
		$data = null;
		$sql = $this->db->get($this->table_name);
		if ($sql->num_rows() > 0) {
			foreach ($sql->result() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function get_data($id)
	{
		$this->db->where('username', $id);
		$sql = $this->db->get($this->table_name);
		return $sql->row();
	}

	public function update_data($data, $id = '')
	{
		$this->db->where('username', $id);
		$sql = $this->db->update($this->table_name, $data);
		return $sql;
	}

	public function delete_data($id)
	{
		$this->db->where('username', $id);
		$sql = $this->db->delete($this->table_name);
		return $sql;
	}
}
?>