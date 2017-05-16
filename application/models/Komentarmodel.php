<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentarmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'komentar';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'id_materi'          => ($inputs['materi-input'] == '') ? null : $inputs['materi-input'],
            'komentator'         => $this->session->userdata('_ID'),
            'level_komentator'   => $inputs['level-input'],
            'isi'                => $inputs['msg-input'],
            'tgl_post'           => date('Y-m-d H:i:s')
        );

        return $fields;
    }

    public function getRules() {    //set rule validasi form
        $komentar = array(
            'field' => 'msg-input', 'label' => 'Isi komentar',
            'rules' => 'trim|required|max_length[255]'
            );

        return array($komentar);
    }
}