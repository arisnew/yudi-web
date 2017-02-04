<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lampiranmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'lampiran';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            //'id_lampiran'   => $inputs['id_lampiran-input'],
            'id_materi'       => ($inputs['materi-input'] == '') ? null : $inputs['materi-input'],
            'nama_lampiran'   => $inputs['nama_lampiran-input'],
            'nama_file'       => $inputs['nama_file-input']
            );

        return $fields;
    }

    public function getRules() {    //set rule validasi form
       /* $id_lampiran = array(
            'field' => 'id_lampiran-input', 'label' => 'id_lampiran',
            'rules' => 'trim|required|max_length[11]|numeric'
            );

        return array($id_lampiran);*/
    }
}