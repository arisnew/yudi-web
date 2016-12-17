<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai_ujianmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'nilai_ujian';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'id_ujian' => $inputs['id_ujian-input'],
            'nis' => ($inputs['siswa-input'] == '') ? null : $inputs['siswa-input'],
            'jumlah_benar' => $inputs['jumlah_benar-input'],
            'jumlah_salah' => $inputs['jumlah_salah-input'],
            'tgl_ujian' => $inputs['tgl_ujian-input'],
            'kode_mapel' => ($inputs['mata_pelajaran-input'] == '') ? null : $inputs['mata_pelajaran-input'],
            'nilai' => $inputs['nilai-input'],
            );

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $id_ujian = array(
            'field' => 'id_ujian-input', 'label' => 'id_ujian',
            'rules' => 'trim|required|max_length[11]'
            );

        $nis = array(
            'field' => 'nis-input', 'label' => 'nis',
            'rules' => 'trim|required|max_length[11]'
            );

        return array($id_ujian, $nis);
    }
}