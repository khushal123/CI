<?php

defined("BASEPATH") or exit("No direct scripts are allowed");

/**
 *
 */
class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    function index() {
        $userData = $this->session->userdata("userData");
        if ($userData) {
            $this->load->view('admin/dashboard', $userData);
        } else {
            redirect(base_url() . "admin/login");
        }
    }

    public function logout() {
        $this->load->driver('cache'); # add
        $this->session->sess_destroy(); # Change
        $this->cache->clean();  # add
        redirect(base_url() . 'admin/login'); # Your default controller name 
        ob_clean(); # add
    }

}

?>
