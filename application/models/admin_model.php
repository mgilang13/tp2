<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function humanById($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->from('t_human');
        return $this->db->get();
    }
}