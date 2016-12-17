<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwalmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'jadwal';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'id_jadwal' => $inputs['id_jadwal-input'],
            'kode_mapel' => $inputs['kode_mapel-input'] == '') ? null : $inputs['kode_mapel-input'],,
            'nip'   => $inputs['nip-input'] == '') ? null : $inputs['nip-input'],,
            'kode_kelas'    => $inputs['kode_kelas-input'] == '') ? null : $inputs['kode_kelas-input'],,
            'kode_jurusan'  => $inputs['kode_jurusan-input'] == '') ? null : $inputs['kode_jurusan-input'],,
            'hari'  => $inputs['hari-input'],
            'jam'   => $inputs['jam-input'],
            'status' => $inputs['status-input']
            );

        //if ($inputs['password-input'] != '') {
            //$fields['password'] = md5($inputs['password-input']);
        //}

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $id_jadwal = array(
            'field' => 'id_jadwal-input', 'label' => 'Kode jadwal',
            'rules' => 'trim|required|max_length[11]'
            );

        $nip = array(
            'field' => 'nip-input', 'label' => 'Nama jadwal',
            'rules' => 'trim|required|max_length[20]'
            );

        return array($id_jadwal, $nip);
    }
}