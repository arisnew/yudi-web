<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mata_pelajaranmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'mata_pelajaran';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'kode_mapel'    => $inputs['kode-mapel-input'],
            'nama_mapel'    => $inputs['nama_mapel-input'],
            'status'        => $inputs['status-input']
            );

        //if ($inputs['password-input'] != '') {
           // $fields['password'] = md5($inputs['password-input']);
        //}
        
        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $kode_mapel = array(
            'field' => 'kode-mapel-input', 'label' => 'Kode Matapelajaran',
            'rules' => 'trim|required|max_length[20]'
            );

        $nama_mapel = array(
            'field' => 'nama_mapel-input', 'label' => 'Nama Matapelajaran ',
            'rules' => 'trim|required|max_length[200]'
            );

        return array($kode_mapel, $nama_mapel);
    }
}