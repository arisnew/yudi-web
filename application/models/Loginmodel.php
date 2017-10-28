<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'user';
        $this->isNew = false;
    }

    public function getRules() {

        $username = array(
            'field' => 'username-input', 'label' => 'Username',
            'rules' => 'trim|required|max_length[20]'
        );

        $pass = array(
            'field' => 'password-input', 'label' => 'Password',
            'rules' => 'trim|required|max_length[50]'
        );

        return array($username, $pass);
    }
}
