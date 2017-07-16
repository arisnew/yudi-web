<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesanmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'pesan';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        if ($inputs['type_pesan-input'] == 'Guru-Guru') {
            $ke = $inputs['to-guru-id'];
        } elseif ($inputs['type_pesan-input'] == 'Guru-Siswa') {
            $ke = $inputs['to-id'];
        } elseif ($inputs['type_pesan-input'] == 'Siswa-Guru') {
            $ke = $inputs['to-guru-id'];
        } elseif ($inputs['type_pesan-input'] == 'Siswa-Siswa') {
            $ke = $inputs['to-id'];
        }
        
        $fields = array(
            'judul'     => $inputs['judul-input'],
            'isi'       => $inputs['isi-input'],
            'dari'      => $this->session->userdata('_ID'),
            'ke'        => $ke,
            'type_pesan'=> $inputs['type_pesan-input'],
            'tgl_post'  => date('Y-m-d H:i:s')
            );
        
        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $judul = array(
            'field' => 'judul-input', 'label' => 'judul',
            'rules' => 'trim|required|max_length[255]'
            );

        return array($judul);
    }
}