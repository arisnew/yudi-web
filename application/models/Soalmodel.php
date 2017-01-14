<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soalmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'soal';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            //'id_soal' => $inputs['id_soal-input'],
            'pertanyaan' => $inputs['pertanyaan-input'],
            'opsi_a' => $inputs['opsi_a-input'],
            'opsi_b' => $inputs['opsi_b-input'],
            'opsi_c' => $inputs['opsi_c-input'],
            'opsi_d' => $inputs['opsi_d-input'],
            'jawaban' => $inputs['jawaban-input'],
            'kode_mapel' => ($inputs['mata_pelajaran-input'] == '') ? null : $inputs['mata_pelajaran-input'],
            'nip' => ($inputs['nip-input'] == '') ? null : $inputs['nip-input'],
            'tgl_posting' => $inputs['tgl_posting-input'] . ' ' . date('H:i:s'),
            );

           }

    public function getRules() {    //set rule validasi form

        $nip = array(
            'field' => 'nip-input', 'label' => 'nip',
            'rules' => 'trim|required|max_length[20]'
            );

        return array($nip);
    }
}