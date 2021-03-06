<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        //verifying login process
        if($this->session->userdata('status') != 'login'){
            redirect(base_url().'/');
        }
    }

    //This is the function for the admin dashboard display
    function index(){
        $data['customer'] = $this->db->query("select * from customer order by customer_id desc limit 3")->result(); //featuring new customers
        $data['car'] = $this->db->query("select * from car order by car_id desc limit 3")->result(); //featuring a new car
        $this->load->view('admin/header');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/footer');
    }

    //Here is the password change function
    function change_password(){
        $this->load->view('admin/header');
        $this->load->view('admin/change_password');
        $this->load->view('admin/footer');
    }
    function change_password_act(){
        $new_pass  = $this->input->post('new_pass');
        $repeat_pass = $this->input->post('repeat_pass');
        
        $this->form_validation->set_rules('new_pass','New password','required|matches[repeat_pass]');
        $this->form_validation->set_rules('repeat_pass','Repeat the new password','required');
        
        if($this->form_validation->run() != false){
            $data   = array('admin_password' => md5($new_pass));
            $w      = array('admin_id' => $this->session->userdata('id'));
            $this->m_rental->update_data($w,$data,'admin');
            redirect(base_url().'admin/change_password?message=succeeded');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/change_password');
            $this->load->view('admin/footer');
        }
    }

    //This is the logout function
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?message=logout');
    }

    //Car CRUD function
    function car(){
        $data['car'] = $this->m_rental->get_data('car')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/car',$data);
        $this->load->view('admin/footer');
    }
    function add_car(){
        $this->load->view('admin/header');
        $this->load->view('admin/add_car');
        $this->load->view('admin/footer');
    }
    //Over here we admin the cars
    function add_car_act(){
        $car_id     = $this->input->post('car_id');
        $car_desc   = $this->input->post('car_desc');
        $chasis     = $this->input->post('car_chasis');
        $engine     = $this->input->post('car_engine');
        $plate      = $this->input->post('car_plate');
        $brand      = $this->input->post('brand_id');
        $model      = $this->input->post('model_id');
        $cat_id     = $this->input->post('cat_id');
        $fuel_id    = $this->input->post('fuel_id');
        $status     = $this->input->post('car_status');
        $this->form_validation->set_rules('brand','Car brand','required');
        $this->form_validation->set_rules('status','Car status','required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'car_id'        => $car_id,
                'car_desc'      => $car_desc,
                'car_chasis'    => $chasis,
                'car_brand'     => $brand,
                'model_id'      => $model,
                'car_engine'    => $engine,
                'car_plate'     => $plate,
                'cat_id'        => $cat_id,
                'fuel_id'       => $fuel_id,
                'car_status'    => $status
            );
            
            $this->m_rental->insert_data($data, 'car');
            redirect(base_url().'admin/car');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/add_car');
            $this->load->view('admin/footer');
        }
    }
    function edit_car($car_id){
        $where = array('car_id' => $car_id);
        $data['car'] = $this->m_rental->edit_data($where,'car')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/edit_car',$data);
        $this->load->view('admin/footer');
    }
    function update_car(){
        $car_id     = $this->input->post('car_id');
        $car_desc   = $this->input->post('car_desc');
        $chasis     = $this->input->post('car_chasis');
        $engine     = $this->input->post('car_engine');
        $plate      = $this->input->post('car_plate');
        $brand      = $this->input->post('brand_id');
        $model      = $this->input->post('model_id');
        $cat_id     = $this->input->post('cat_id');
        $fuel_id    = $this->input->post('fuel_id');
        $status     = $this->input->post('car_status');
        $this->form_validation->set_rules('brand_id','Car brand','required');
        $this->form_validation->set_rules('car_status','Car status','required');
        
        if($this->form_validation->run() != false){
            $where = array('car_id' => $car_id);
            $data = array(
                'car_id'        => $car_id,
                'car_desc'      => $car_desc,
                'car_chasis'    => $chasis,
                'car_brand'     => $brand,
                'model_id'      => $model,
                'car_engine'    => $engine,
                'car_plate'     => $plate,
                'cat_id'        => $cat_id,
                'fuel_id'       => $fuel_id,
                'car_status'    => $status
            );
            
            $this->m_rental->update_data($where, $data, 'car');
            redirect(base_url().'admin/car');
        } else {
            $where = array('car_id' => $car_id);
            $data['car'] = $this->m_rental->edit_data($where,'car')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/edit_car',$data);
            $this->load->view('admin/footer');
        }
    }
    function delete_car($car_id){
        $where = array('car_id' => $car_id);
        $this->m_rental->delete_data($where, 'car');
        redirect(base_url().'admin/car');
    }

    //This is the Customer CRUD function
    function customer(){
        $data['customer'] = $this->m_rental->get_data('customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer',$data);
        $this->load->view('admin/footer');
    }
    function add_customer(){
        $this->load->view('admin/header');
        $this->load->view('admin/add_customer');
        $this->load->view('admin/footer');
    }
    function add_customer_act(){
        $customer_name   = $this->input->post('customer_name');
        $customer_address = $this->input->post('customer_address');
        $customer_gender     = $this->input->post('customer_gender');
        $customer_phone     = $this->input->post('customer_phone');
        $customer_cedula    = $this->input->post('customer_cedula');
        $this->form_validation->set_rules('customer_name','Name','required');
        $this->form_validation->set_rules('customer_cedula','Cedula','required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'customer_name'     => $customer_name,
                'customer_address'  => $customer_address,
                'customer_gender'   => $customer_gender,
                'customer_phone'    => $customer_phone,
                'customer_cedula'   => $customer_cedula
            );
            
            $this->m_rental->insert_data($data, 'customer');
            redirect(base_url().'admin/customer');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/add_customer');
            $this->load->view('admin/footer');
        }
    }
    function edit_customer($customer_id){
        $where = array('customer_id' => $customer_id);
        $data['customer'] = $this->m_rental->edit_data($where,'customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/edit_customer',$data);
        $this->load->view('admin/footer');
    }
    function update_customer(){
        $customer_id     = $this->input->post('customer_id');
        $customer_name   = $this->input->post('customer_name');
        $customer_address = $this->input->post('customer_address');
        $customer_gender     = $this->input->post('customer_gender');
        $customer_phone     = $this->input->post('customer_phone');
        $customer_cedula   = $this->input->post('customer_cedula');
        $this->form_validation->set_rules('customer_name','Nombre','required');
        $this->form_validation->set_rules('customer_cedula','Numero de Cedula','required');
        
        if($this->form_validation->run() != false){
            $where = array('customer_id' => $customer_id);
            $data = array(
                'customer_name'     => $customer_name,
                'customer_address'  => $customer_address,
                'customer_gender'   => $customer_gender,
                'customer_phone'    => $customer_phone,
                'customer_cedula'   => $customer_cedula
            );
            
            $this->m_rental->update_data($where, $data, 'customer');
            redirect(base_url().'admin/customer');
        } else {
            $where = array('customer_id' => $customer_id);
            $data['customer'] = $this->m_rental->edit_data($where,'customer')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/edit_customer',$data);
            $this->load->view('admin/footer');
        }
    }    
    function delete_customer($customer_id){
        $where = array('customer_id' => $customer_id);
        $this->m_rental->delete_data($where, 'customer');
        redirect(base_url().'admin/customer');
    }

    //Here we are going to administer the employees information
    function employee(){
        $data['employee'] = $this->m_rental->get_data('employee')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/employee',$data);
        $this->load->view('admin/footer');
    }
    function add_employee(){
        $this->load->view('admin/header');
        $this->load->view('admin/add_employee');
        $this->load->view('admin/footer');
    }
    function add_employee_act(){
        $employee_id            = $this->input->post('employee_id');
        $employee_name          = $this->input->post('employee_name');
        $employee_cedula        = $this->input->post('employee_cedula');
        $employee_schedule      = $this->input->post('employee_schedule');
        $employee_commission    = $this->input->post('employee_commission');
        $employee_hiring_date   = $this->input->post('employee_hiring_date');
        $employee_status        = $this->input->post('employee_status');
        $this->form_validation->set_rules('employee_name','Name','required');
        $this->form_validation->set_rules('employee_cedula','Cedula','required');
        
        if($this->form_validation->run() != false){
            $data = array(
                'employee_id'           => $employee_id,
                'employee_name'         => $employee_name,
                'employee_cedula'       => $employee_cedula,
                'employee_schedule'     => $employee_schedule,
                'employee_commission'   => $employee_commission,
                'employee_hiring_date'  => $employee_hiring_date,
                'employee_status'       => $employee_status
            );
            
            $this->m_rental->insert_data($data, 'employee');
            redirect(base_url().'admin/employee');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/add_employee');
            $this->load->view('admin/footer');
        }
    }
    function edit_employee($employee_id){
        $where = array('employee_id' => $employee_id);
        $data['employee'] = $this->m_rental->edit_data($where,'employee')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/edit_employee',$data);
        $this->load->view('admin/footer');
    }
    function update_employee(){
        $employee_id            = $this->input->post('employee_id');
        $employee_name          = $this->input->post('employee_name');
        $employee_cedula        = $this->input->post('employee_cedula');
        $employee_schedule      = $this->input->post('employee_schedule');
        $employee_commission    = $this->input->post('employee_commission');
        $employee_hiring_date   = $this->input->post('employee_hiring_date');
        $employee_status        = $this->input->post('employee_status');
        $this->form_validation->set_rules('employee_name','Name','required');
        $this->form_validation->set_rules('employee_cedula','Cedula','required');
        
        if($this->form_validation->run() != false){
            $where = array('employee_id' => $employee_id);
            $data = array(
                'employee_id'           => $employee_id,
                'employee_name'         => $employee_name,
                'employee_cedula'       => $employee_cedula,
                'employee_schedule'     => $employee_schedule,
                'employee_commission'   => $employee_commission,
                'employee_hiring_date'  => $employee_hiring_date,
                'employee_status'       => $employee_status
            );
            
            $this->m_rental->update_data($where, $data, 'employee');
            redirect(base_url().'admin/employee');
        } else {
            $where = array('employee_id' => $employee_id);
            $data['employee'] = $this->m_rental->edit_data($where,'employee')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/edit_employee',$data);
            $this->load->view('admin/footer');
        }
    }
    function delete_employee($employee_id){
        $where = array('employee_id' => $employee_id);
        $this->m_rental->delete_data($where, 'employee');
        redirect(base_url().'admin/employee');
    }  

}    

?>    