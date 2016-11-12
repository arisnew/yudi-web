<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswamodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'siswa';  //choose table
        $this->isNew = false;
        //$this->load->library('formatdate');
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'nis' => $inputs['nis-input'],
            'nama' => $inputs['nama-input'],
            'alamat' => $inputs['alamat-input'],
            'kelas' => $inputs['kelas-input']
            //'password' => $inputs['password-input']
        );

        //if ($inputs['password-input'] != '') {
            //$fields['password'] = $inputs['password-input'];        
        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $nis = array(
            'field' => 'nis-input', 'label' => 'Nis',
            'rules' => 'trim|required|max_length[5]|numeric'
        );

        $nama = array(
            'field' => 'nama-input', 'label' => 'Nama',
            'rules' => 'trim|required|max_length[50]'
        );

        return array($nis, $nama);
    }
}