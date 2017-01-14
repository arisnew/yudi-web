<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesanmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'pesan';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'judul'     => $inputs['judul-input'],
            'isi'       => $inputs['isi-input'],
            'dari'      => $inputs['dari-input'],
            'ke'        => $inputs['ke-input'],
            'type_pesan'=> $inputs['type_pesan-input'],
            'tgl_post'  => $inputs['tgl_post-input'] . ' ' . date('H:i:s')
            );
        
        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $judul = array(
            'field' => 'judul-input', 'label' => 'judul',
            'rules' => 'trim|required|max_length[255]'
            );

        $dari = array(
            'field' => 'dari-input', 'label' => 'dari',
            'rules' => 'trim|required|max_length[25]'
            );

        $ke = array(
            'field' => 'ke-input', 'label' => 'ke',
            'rules' => 'trim|required|max_length[25]'
            );

        return array($judul, $dari, $ke);
    }
}