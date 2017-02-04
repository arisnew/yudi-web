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
            'komentator'         => $inputs['komentator-input'],
            'level_komentator'   => $inputs['level_komentator-input'],
            'isi'                => $inputs['isi-input'],
            'tgl_post'           => $inputs['tgl_post-input'] . ' ' . date('H:i:s')
            );

        
        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $komentator = array(
            'field' => 'komentator-input', 'label' => 'komentator',
            'rules' => 'trim|required|max_length[25]'
            );

        return array($komentator);
    }
}