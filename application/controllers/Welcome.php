<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->model('m_rental');
    }
    
    public function index(){
        $this->load->view('login');
    }
    
    function login(){
        $username = $this->input->post('user_name');
        $password = $this->input->post('user_password');
        $this->form_validation->set_rules('user_name','Username','trim|required');
        $this->form_validation->set_rules('user_password','Password','trim|required');
        if($this->form_validation->run() != false){
            $where = array(
                'admin_username' => $username,
                'admin_password' => md5($password)
            );
            $data = $this->m_rental->edit_data($where,'admin');
            $d = $this->m_rental->edit_data($where,'admin')->row();
            $cek = $data->num_rows();
            if($cek > 0){
                $session = array(
                    'admin_id' => $d->admin_id,
                    'admin_name' => $d->admin_name,
                    'admin_status' => 'login'
                );
                $this->session->set_userdata($session);
                redirect(base_url().'admin');
            } else {
                redirect(base_url().'welcome_message');
            }
        } else {
            $this->load->view('login');
        }
    }
}
