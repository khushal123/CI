<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view("admin/index");
    }

    public function checkLogin() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data = array(
                'message' => 'Invalid username or password!',
            );
            $this->session->set_flashdata('loginFailed', 1);
            redirect(base_url() . "admin/login/loginFailed");
        } else {
            $key = $this->config->item('encryption_key');
            $this->load->helper("custom_enc");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $type = $this->input->post("type");
            $encryptedEmail = encrypt($email, $key);
            $hashedPassword = sha1($password . $key);
            $this->load->model("AdminLogin");
            $isLoginSuccess = $this->AdminLogin->checkLogin($encryptedEmail, $hashedPassword, $type);
            if ($isLoginSuccess) {
                $data = array(
                    'message' => 'Logged in successfully',
                );
                $this->session->set_userdata('userData', $isLoginSuccess);
                redirect(base_url() . 'admin/dashboard');
            } else {
                $data = array(
                    'message' => 'Invalid username or password!',
                );
                $this->session->set_flashdata('loginFailed', 1);
                redirect(base_url() . "admin/login/loginFailed");
            }
        }
    }

    public function loginFailed() {
        $loginFailed = $this->session->flashdata('loginFailed');
        if ($loginFailed == 1) {
            $data = array('message' => 'Invalid user id or password');
            $this->load->view("admin/index", $data);
        } else {
            redirect(base_url() . "admin/login");   # code...
        }
    }
}
