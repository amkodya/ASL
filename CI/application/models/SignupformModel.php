<?php

class SignupformModel extends CI_Model
{
    public function insert_address($data) {
        $this->load->database();
        $this->db->insert("login", $data);
    }
}

?>