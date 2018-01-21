<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gurumodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'guru';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'nip'            => $inputs['nip-input'],
            'nama'           => $inputs['nama-input'],
            'alamat'         => $inputs['alamat-input'],
            'tempat_lahir'   => $inputs['tempat_lahir-input'],
            'tgl_lahir'      => $inputs['tgl_lahir-input'],
            'jenis_kelamin'  => $inputs['jenis_kelamin-input'],
            'agama'          => $inputs['agama-input'],
            'no_telp'        => $inputs['no_telp-input'],
            'email'          => $inputs['email-input'],
            'status_pegawai' => $inputs['status_pegawai-input'],
            'username'       => $inputs['username-input'],
            'level'          =>  'Guru',
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
        $newRule = ($this->isNew) ? '|is_unique[' . $this->table . '.nip]' : '';
        $nip = array(
            'field' => 'nip-input', 'label' => 'Nip',
            'rules' => 'trim|required|max_length[11]|numeric'
            );

        $nama = array(
            'field' => 'nama-input', 'label' => 'Nama',
            'rules' => 'trim|required|max_length[200]'
            );

        $username = array(
            'field' => 'username-input', 'label' => 'Username',
            'rules' => 'trim|required|max_length[20]'
            );

        return array($nip, $nama, $username);
    }
}