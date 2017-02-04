<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwalmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'jadwal';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'kode_mapel'        => ($inputs['mata_pelajaran-input'] == '') ? null : $inputs['mata_pelajaran-input'],
            'nip'               => ($inputs['guru-input'] == '') ? null : $inputs['guru-input'],
            'kode_kelas'        => ($inputs['kelas-input'] == '') ? null : $inputs['kelas-input'],
            'kode_jurusan'      => ($inputs['jurusan-input'] == '') ? null : $inputs['jurusan-input'],
            'hari'              => $inputs['hari-input'],
            'jam'               => $inputs['jam-input'],
            'status'            => $inputs['status-input']
            );

        //if ($inputs['password-input'] != '') {
            //$fields['password'] = md5($inputs['password-input']);
        //}

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $hari = array(
            'field' => 'hari-input', 'label' => 'hari',
            'rules' => 'trim|required|max_length[1]'
            );

        $jam = array(
            'field' => 'guru-input', 'label' => 'jam',
            'rules' => 'trim|required|max_length[15]'
            );

        return array($hari, $jam);
    }
}