<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gurumodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'guru';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'id_gu   ru'        => $inputs['id-input'],
            'nama'          => $inputs['nama-input'],
            'matapelajaran' => $inputs['mp-input'],
            'email'         => $inputs['email-input']
        );
        return $fields;
    }

    public function getRules() {    //set rule validasi form
        $id = array(
            'field' => 'id-input', 'label' => 'ID Guru',
            'rules' => 'trim|required|max_length[11]|numeric'
        );

        $nama = array(
            'field' => 'nama-input', 'label' => 'Nama',
            'rules' => 'trim|required|max_length[20]'
        );

        return array($id, $nama);
    }
}