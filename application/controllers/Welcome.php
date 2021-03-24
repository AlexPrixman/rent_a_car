<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }
    function index(){
        redirect(base_url().'index.php/admin');
    }
}
