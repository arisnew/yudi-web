<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusanmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'jurusan';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'kode_jurusan' => $inputs['kode_jurusan-input'],
            'nama_jurusan' => $inputs['nama_jurusan-input'],
            'status'       => $inputs['status-input']
            );

        //if ($inputs['password-input'] != '') {
            //$fields['password'] = md5($inputs['password-input']);
        //}

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $kode_jurusan = array(
            'field' => 'kode_jurusan-input', 'label' => 'Kode jurusan',
            'rules' => 'trim|required|max_length[20]'
            );

        $nama_jurusan = array(
            'field' => 'nama_jurusan-input', 'label' => 'Nama jurusan',
            'rules' => 'trim|required|max_length[200]'
            );

        return array($kode_jurusan, $nama_jurusan);
    }
}