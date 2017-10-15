<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'admin';  //choose table
        $this->isNew = false;
    }

    public function getField($inputs = array()) { // set data input for model (mapping db vs form input)
        $fields = array(
            'username'  => $inputs['username-input'],
            'nama'      => $inputs['nama-input'],
            'email'     => $inputs['email-input'],
            'level'     =>  'Admin',
            'status'    => $inputs['status-input']
            );

        if ($inputs['password-input'] != '') {
            $fields['password'] = md5($inputs['password-input']);
        }
        
        return $fields;
    }

    public function getRules() {    //set rule validasi form
        $newRule = ($this->isNew) ? '|is_unique[' . $this->table . '.username]' : '';
        $username = array(
            'field' => 'username-input', 'label' => 'Username',
            'rules' => 'trim|required|max_length[10]' . $newRule
            );

        $nama = array(
            'field' => 'nama-input', 'label' => 'Nama',
            'rules' => 'trim|required|max_length[50]'
            );

        return array($username, $nama);
    }
}