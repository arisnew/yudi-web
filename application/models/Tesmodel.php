<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tesmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tes_jawaban';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        
        //$fields = array();

        if (isset($inputs['opsi-input']) && $inputs['opsi-input'] != '') {
            $fields['jawaban'] = $inputs['opsi-input'];
        } else {
            $fields['jawaban'] = null;
        }

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $opsi = array(
            'field' => 'opsi-input',
            'label' => 'opsi',
            'rules' => 'trim|max_length[10]'
            );

        return array($opsi);
    }
}