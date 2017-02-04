<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai_ujianmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'nilai_ujian';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'nis'              => ($inputs['siswa-input'] == '') ? null : $inputs['siswa-input'],
            'jumlah_benar'     => $inputs['jumlah_benar-input'],
            'jumlah_salah'     => $inputs['jumlah_salah-input'],
            'tgl_ujian'        => $inputs['tgl_ujian-input'] . ' ' . date('H:i:s'),
            'kode_mapel'       => ($inputs['mata_pelajaran-input'] == '') ? null : $inputs['mata_pelajaran-input'],
            'nilai'            => $inputs['nilai-input']
            );

        return $fields;
    }

    public function getRules() {    //set rule validasi form

        $jumlah_benar = array(
            'field' => 'jumlah_benar-input', 'label' => 'jumlah benar',
            'rules' => 'trim|required|max_length[5]'
            );

        $jumlah_salah = array(
            'field' => 'jumlah_salah-input', 'label' => 'jumlah salah',
            'rules' => 'trim|required|max_length[5]'
            );

        return array( $jumlah_benar, $jumlah_salah);
    }
}