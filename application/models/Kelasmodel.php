<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelasmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'kelas';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'nama_kelas'    => $inputs['nama-input'],
            'status'        => $inputs['status-input'],
            'deskripsi'     => $inputs['deskripsi-input']
        );
        
        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $nama = array(
            'field' => 'nama-input', 'label' => 'Nama Kelas',
            'rules' => 'trim|required|max_length[200]'
        );

        $deskripsi = array(
            'field' => 'deskripsi-input', 'label' => 'Deskripsi',
            'rules' => 'trim'
        );

        return array($nama, $deskripsi);
    }
}