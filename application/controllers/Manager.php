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

    public function generate_test($id_materi, $nis)
    {
        $id_tes = null;
        $msg = '';
        $code = 0;
        /*
        arti code:
        0 = tidak valid id_materi/nis
        1 = generate sukses
        2 = data sudah ada
        */
        if ($id_materi && $nis) {
            //exist?
            $cek = $this->model->getRecord(array('table' => 'tes', 'where' => array('id_materi' => $id_materi, 'nis' => $nis)));
            if ($cek) {
                if ($cek->status_tes == 'Selesai') {
                    $code = 3;
                    $msg = 'Sudah mengerjakan test & sudah selesai!';
                } else {
                    $msg = 'Sudah mengerjakan test, belum selesai.';
                    $code = 2;
                }

                $id_tes = $cek->id_tes;
                
            } else {
                //data soal by materi
                $soal = $this->model->getList(array('table' => 'soal', 'where' => array('id_materi' => $id_materi)));
                if ($soal) {
                    //simpan ke tes
                    $data_tes = array(
                        'nis' => $nis,
                        'id_materi' => $id_materi,
                        'tgl_tes' => date('Y-m-d'),
                        'status_tes' => 'Belum'
                        );
                    $simpan_tes = $this->db->insert('tes', $data_tes);
                    //jika simpan berhasil
                    if ($simpan_tes) {
                        //id test
                        $id_tes = $this->db->insert_id();
                        foreach ($soal as $row) {
                            //setiap soal simpan ke tes_jawaban
                            $data_jawaban = array(
                                'id_tes' => $id_tes,
                                'id_soal' => $row->id_soal,
                                'jawaban' => '',
                                'status_jawaban' => 'Belum'
                                );
                            //do save
                            $this->db->insert('tes_jawaban', $data_jawaban);
                        }

                        $msg = 'Lanjut test-nya';
                        $code = 1;

                    }
                }
            }
        }

        echo json_encode(array('code' => $code, 'msg' => $msg, 'last_id' => $id_tes));
    }

    public function akhiri_tes($id_tes)
    {
        $code = 0;
        $test = $this->model->getRecord(array('table' => 'tes', 'where' => array('id_tes' => $id_tes, 'status_tes' => 'Belum')));
        if ($test) {
            //update status test
            $data_to_update = array(
                'status_tes' => 'Selesai'
            );

            //do 
            $this->db->where('id_tes', $id_tes);
            $doing = $this->db->update('tes', $data_to_update);
            if ($doing) {
                $code = 1;
            }
        }

        echo json_encode(array('code' => $code));
    }
}