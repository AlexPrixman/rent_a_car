<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Private_area extends CI_Controller {
 public function __construct()
 {
  parent::__construct();
  if(!$this->session->userdata('user_id'))
  {
   redirect('login');
  }
 }

 function index()
 {
  echo '<br /><br /><br /><h1 align="center">Bienvenido Usuario</h1>';
  echo '<p align="center"><a href="'.base_url().'private_area/logout">Cerrar Sesion</a></p>';
 }

 function logout()
 {
  $data = $this->session->all_userdata();
  foreach($data as $row => $rows_value)
  {
   $this->session->unset_userdata($row);
  }
  redirect('login');
 }
}

?>