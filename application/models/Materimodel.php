<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materimodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'materi';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'id_jadwal'   => $inputs['jadwal-input'],
            'judul'         => $inputs['judul-input'],
            'isi'           => $inputs['isi-input'],
            'nip'           => ($inputs['guru-input'] == '') ? null : $inputs['guru-input'],
            'tgl_posting'   => $inputs['tgl_posting-input'] . ' ' . date('H:i:s'),
            'publish'       => $inputs['publish-input']
            );

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $judul = array(
            'field' => 'judul-input', 'label' => 'judul',
            'rules' => 'trim|required|max_length[255]'
            );
        $jadwal = array(
            'field' => 'jadwal-input', 'label' => 'ID Jadwal',
            'rules' => 'trim|required|max_length[11]'
            );

        return array($judul, $jadwal);
    }
}