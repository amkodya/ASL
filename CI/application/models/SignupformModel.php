<?php

class SignupformModel extends CI_Model
{
    public function insert_address($data) {
        $this->load->database();
        $this->db->insert("login", $data);
    }

    function getName() {
        $query = $this->db->get('login');
        $user = array();

        foreach ($query->result() as $row) {
            $user[] = array(
                'username' => $row->username,
            );
        }

        return $user;
    }

}

?>