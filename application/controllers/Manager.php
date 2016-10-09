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
                    $query['table'] = 'user';
                    $query['where'] = array(
                        'username' => $this->input->post('username-input'), 'status' => 'Aktif' // is alive
                    );
                    $actor = $this->loginmodel->getRecord($query);

                    if ($actor == null) {
                        $code = 2;
                    } else {
                        $this->load->library('cryptorgram');

                        if ($this->cryptorgram->decrypt($actor->password) == $this->input->post('password-input')) {
                            $this->session->set_userdata(array(
                                '_USER_ID' => $actor->username,
                                '_NAME' => $actor->nama,
                                '_LEVEL' => $actor->level,
                                '_IMG' => $actor->foto
                            ));
                            $code = 1;
                            //untuk keperluan log
                            //$id_user = $actor->entity_id;
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
                if($action == $this->$model->COMPLETE){
                    $this->form_validation->set_rules($this->$model->getRulesComplete());
                } else {
                    $this->form_validation->set_rules($this->$model->getRules());
                }

                if ($this->form_validation->run() == FALSE) {
                    $delimiter = '- ';
                    $this->form_validation->set_error_delimiters($delimiter, '.<br>');
                    $message = validation_errors();
                } else {
                    $isExist = '';
                    //khusus privilege
                    if ($this->input->post('model-input') == 'privilege') {
                        if ($action != $this->$model->DELETE) {
                            $results = self::_privilegeRecord($this->input->post(null), $action);
                            $result = $results;
                        } else {
                            $result = self::_do($this->$model, $action, $this->input->post(null));
                        }
                    
                    } else {
                        //if complete
                        if ($action == $this->$model->COMPLETE) {
                            $result = self::_do_complete($this->$model, $this->input->post(null));
                            $message = $result;
                        } else {
                            $result = self::_do($this->$model, $action, $this->input->post(null));
                        }
                    }

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

    //untuk privilege
    private function _privilegeRecord($inputs, $action) {
        // prevent duplicate privilege
        $this->load->model('privilegemodel');
        $this->privilegemodel->isNew(true); // if action is for creating new data, ignore unique field
        $privilegeExist = $this->privilegemodel->getRecord(array(
            'table' => 'privilege', 'where' => array(
                'KdUser' => $inputs['user-input'], 'Type' => $inputs['type-input']
            )
        ));
        $lastRecord = 0;
        $status = 'error';

        if ($privilegeExist == null) {
            $result = self::_do($this->privilegemodel, $this->privilegemodel->CREATE, $inputs);
        } else {
            $inputs['value-input'] = $privilegeExist->id;
            $result = self::_do($this->privilegemodel, $this->privilegemodel->UPDATE, $inputs);
        }
        return $result;
    }
}
