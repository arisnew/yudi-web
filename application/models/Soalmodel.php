<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SoalModel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'soal';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'pertanyaan'    => $inputs['pertanyaan-input'],
            'opsi_a'        => $inputs['opsi_a-input'],
            'opsi_b'        => $inputs['opsi_b-input'],
            'opsi_c'        => $inputs['opsi_c-input'],
            'opsi_d'        => $inputs['opsi_d-input'],
            'jawaban'       => $inputs['jawaban-input'],
            'id_materi'     => ($inputs['id_materi'] == '') ? null : $inputs['id_materi'],
            'nip'           => ($inputs['guru-input'] == '') ? null : $inputs['guru-input'],
            'tgl_posting'   => $inputs['tgl_posting-input'] . ' ' . date('H:i:s')
            );

        //must return
        return $fields;

    }

    public function getRules() {    //set rule validasi form

        $jawaban = array(
            'field' => 'jawaban-input', 'label' => 'jawaban',
            'rules' => 'trim|required|max_length[5]'
            );
        $materi = array(
            'field' => 'id_materi', 'label' => 'ID materi',
            'rules' => 'trim|required|max_length[11]'
            );

        return array($jawaban, $materi);
    }
}