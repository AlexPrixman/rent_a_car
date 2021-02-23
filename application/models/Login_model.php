<?php
class Login_model extends CI_Model
{
 function can_login($email, $password)
 {
  $this->db->where('user_email', $email);
  $query = $this->db->get('codeigniter_register');
  if($query->num_rows() > 0)
  {
   foreach($query->result() as $row)
   {
    if($row->is_email_verified == 'yes')
    {
     $store_password = $this->encrypt->decode($row->password);
     if($password == $store_password)
     {
      $this->session->set_userdata('user_id', $row->id);
     }
     else
     {
      return 'Wrong Password';
     }
    }
    else
    {
     return 'First verified your email address';
    }
   }
  }
  else
  {
   return 'Wrong Email Address';
  }
 }
}

?>