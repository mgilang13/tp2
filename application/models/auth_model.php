<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function insert_registration($data) {
        $this->db->insert('t_human', $data);
    }

    public function email_checker($email) {
        $query = $this->db->get_where('t_human', array('email' => $email));
        if($query->num_rows()>0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function password_checker($email, $password) {
        $password_in_db = $this->db->select('password')
                                ->where('email', $email)
                                ->get('t_human')->row()->password;
       
        if(password_verify($password, $password_in_db) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function role_id_checker($email) {
        $role_id = $this->db->select('role_id')
                        ->where('email', $email)
                        ->get('t_human')->row()->role_id;
        return $role_id;
    }
}