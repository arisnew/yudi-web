<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
    private $activeSession; // store session

    public function __construct() {
        parent::__construct();
        $this->activeSession = $this->session->userdata('_USER_ID');
        $this->load->library('form_validation');
    }

    public function index() {
        redirect(site_url('view/home'));
    }

    /*
    *	login or logout
    */
    public function identify($action) {
        if ($action == 'acknowledge') { // for login
            /*
            * code info:
            *	- 0 = akses tidak sah
            *	- 1 = user granted
            *	- 2 = user ID tidak dikenal
            *	- 3 = user Password salah
            */
            $code = 0;
            $message = '';
            $id_user = '';

            if ($this->activeSession == null) {
                $this->load->model('loginmodel');
                $this->form_validation->set_rules($this->loginmodel->getRules());

                if ($this->form_validation->run() == FALSE) {
                    $delimiter = '- ';
                    $this->form_validation->set_error_delimiters($delimiter, '. ');
                    $message = validation_errors();
                } else {
                    $tbl_name = strtolower($this->input->post('type-input'));
                    $query['table'] = $tbl_name; //'user';   //???
                    $query['where'] = array(
                        'username' => $this->input->post('username-input'), 'status' => 'Aktif' // is alive
                    );
                    $actor = $this->loginmodel->getRecord($query);

                    if ($actor == null) {
                        $code = 2;
                    } else {
                        if ($actor->password == md5($this->input->post('password-input'))) {
                            if ($tbl_name == 'siswa') {
                                $id = $actor->nis;
                            } else if ($tbl_name == 'guru') {
                                $id = $actor->nip;
                            } else {
                                $id = $actor->username;
                            }
                            $this->session->set_userdata(array(
                                '_ID' => $id,
                                '_USER_ID' => $actor->username,
                                '_NAME' => $actor->nama,
                                '_LEVEL' => $actor->level,
                                '_IMG' => $actor->foto
                            ));
                            $code = 1;
                        } else {
                            $code = 3;
                        }
                    }
                }
            }

            echo json_encode(array('data' => array(
                'code' => $code,
                'message' => $message
            )));
        } else if ($action == 'revoke') { // for logout
            if ($this->activeSession != null) {
                $this->session->sess_destroy();
            }
            redirect(site_url());
        }
    }

    /*
    *	create, update, or delete
    */
    public function process() {
        /*
        * code info:
        *	- 0 = akses tidak sah
        *	- 1 = proses berhasil
        *	- 2 = proses gagal
        */
        $code = 0;
        $last_id = 0;
        $message = '';
        /* collect request */
        $action = $this->input->post('action-input'); // create, update, delete
        $model = $this->input->post('model-input') . 'model';

        if ($this->activeSession != null) {
            $this->load->model($model);
            $this->$model->isNew(($action == $this->$model->CREATE)); // if action is for creating new data, ignore unique field

            //if delete
            if($action == $this->$model->DELETE) {
                $result = self::_do_delete($this->$model, $this->input->post(null));
                $code = ($result) ? 1 : 2;
            } else {
                $this->form_validation->set_rules($this->$model->getRules());

                if ($this->form_validation->run() == FALSE) {
                    $delimiter = '- ';
                    //$this->form_validation->set_error_delimiters($delimiter, '.<br>');
                    $message = validation_errors();
                } else {
                    $isExist = '';
                    $result = self::_do($this->$model, $action, $this->input->post(null));

                    $last_id = ($action == $this->$model->CREATE) ? $this->$model->getLastID() : $this->input->post('value-input') ;
                    $code = ($result) ? 1 : 2;

                    if ($isExist == 'exist') {
                        $code = -1;
                    }
                }
            }
        }

        echo json_encode(array('data' => array(
            'code' => $code,
            'message' => $message,
            'last_id' => $last_id
        )));
    }

    /*
    * inner process
    */
    private function _do($model, $action, $inputs) {
        $query = array(
            'table' => $model->getTable(), 'type' => $action,
            'data' => ($action == 4)? $model->getFieldComplete($inputs) : $model->getField($inputs),
            'at' => array(
                $inputs['key-input'] => $inputs['value-input']
            ) // clause for model
        );
        return $model->action($query); // do...
    }

    private function _do_delete($model, $inputs) {
        $query = array(
            'table' => $model->getTable(), 'type' => 3,
            'data' => 'null',
            'at' => array(
                $inputs['key-input'] => $inputs['value-input']
            ) // clause for model
        );
        return $model->action($query); // do...
    }
}