<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Jabatan extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->database();
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $jabatan = $this->db->get('tbl_jabatan')->result();
        } else {
            $this->db->where('id', $id);
            $jabatan = $this->db->get('tbl_jabatan')->result();
        }
        $this->response($jabatan, 200);
    }

    public function index_post()
    {

        $data = array(
            'jabatan'      => $this->post('jabatan'),
            'status'       => $this->post('status')
        );

        $insert = $this->db->insert('tbl_jabatan', $data);
        if ($insert) {
            $this->response(array('status' => 200,'message' => 'success'), 200);
        } else {
            $this->response(array('status' => 502,'message' => 'fail', 502));
        }
    }

    public function index_put() {

        $id = $this->put('id');
        $data = array(
            'id'       => $this->put('id'),
            'jabatan'  => $this->put('jabatan'),
            'status'   => $this->put('status')
        );

        $this->db->where('id', $id);
        $update = $this->db->update('tbl_jabatan', $data);

        if ($update) {
            $this->response(array('status' => 200,'message' => 'success'), 200);
        } else {
            $this->response(array('status' => 502,'message' => 'fail', 502));
        }
    }

    public function index_delete() {

        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('tbl_jabatan');
        if ($delete) {
            $this->response(array('status' => 200,'message' => 'success'), 201);
        } else {
            $this->response(array('status' => 502,'message' => 'fail', 502));
        }
    }

}
