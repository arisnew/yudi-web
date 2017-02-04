<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelasmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'kelas';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'kode_kelas'    => $inputs['kode_kelas-input'],
            'nama_kelas'    => $inputs['nama_kelas-input'],
            'status'        => $inputs['status-input']
            );

        //if ($inputs['password-input'] != '') {
            //$fields['password'] = md5($inputs['password-input']);
        //}

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $kode_kelas = array(
            'field' => 'kode_kelas-input', 'label' => 'Kode kelas',
            'rules' => 'trim|required|max_length[20]'
            );

        $nama_kelas = array(
            'field' => 'nama_kelas-input', 'label' => 'Nama kelas',
            'rules' => 'trim|required|max_length[200]'
            );

        return array($kode_kelas, $nama_kelas);
    }
}