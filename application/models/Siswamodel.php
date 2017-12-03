<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswamodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'siswa';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'nis'            => $inputs['nis-input'],
            'nama'           => $inputs['nama-input'],
            'alamat'         => $inputs['alamat-input'],
            'tempat_lahir'   => $inputs['tempat_lahir-input'],
            'tgl_lahir'      => $inputs['tgl_lahir-input'],
            'jenis_kelamin'  => $inputs['jenis_kelamin-input'],
            'agama'          => $inputs['agama-input'],
            'thn_masuk'      => $inputs['thn_masuk-input'],
            'email'          => $inputs['email-input'],
            'no_telp'        => $inputs['no_telp-input'],
            'username'       => $inputs['username-input'],
            'kelas'          => ($inputs['kelas-input'] == '') ? null : $inputs['kelas-input'],
            'jurusan'        => ($inputs['jurusan-input'] == '') ? null : $inputs['jurusan-input'],
            'level'          =>  'Siswa',
            'status'         => $inputs['status-input']
            
            );

        if ($inputs['password-input'] != '') {
            $fields['password'] = md5($inputs['password-input']);
        }

        //jika upload via ajax manual
        //parameter upload
        $conf_upload = array(
            'input_name' => 'file-img',
            'folder_path' => 'asset/img/upload/',
            'file_type' => '*',
            'max_size' => '5120'
            );

        $foto = $this->file_upload($conf_upload);

        //jika ada simpan...
        if ($foto) {
            $fields['foto'] = $foto;
        }
        
        return $fields;
    }

    public function getRules() {    //set rule validasi form
        //if new record validate the nis
        $newRule = ($this->isNew) ? '|is_unique[' . $this->table . '.nis]' : '';
        $nis = array(
            'field' => 'nis-input', 'label' => 'Nis',
            'rules' => 'trim|required|max_length[20]|numeric' . $newRule
            );

        $nama = array(
            'field' => 'nama-input', 'label' => 'Nama',
            'rules' => 'trim|required|max_length[200]'
            );

        return array($nis, $nama);
    }
}