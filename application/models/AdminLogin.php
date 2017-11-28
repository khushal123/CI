<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database('default');
    }

    public function checkLogin($email, $password, $type) {
        $query = 'select * from admin where ' . $type . '=? and password=?';
        $result = $this->db->query($query, array($email, $password));
        $row = $result->row();
        if(count($row) > 0){
            return $row;
        }
        return FALSE;
    }

}
