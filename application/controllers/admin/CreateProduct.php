<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined("BASEPATH") or exit("No direct script access allowed");

class CreateProduct extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function index() {
        $userData = $this->session->userdata("userData");
        if ($userData) {
            $this->load->view('admin/create', $userData);
        } else {
            redirect(base_url() . "admin/login");
        }
    }

}


