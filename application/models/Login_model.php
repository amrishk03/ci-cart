<?php
class Login_model extends CI_Model
{
    function can_login($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('codeigniter_register');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $store_password = $row->password;
                if (md5($password) == $store_password) {
                    $this->session->set_userdata('id', $row->id);
                } else {
                    return 'Wrong Password';
                }
            }
        } else {
            return 'Wrong Email Address';
        }
    }
}
