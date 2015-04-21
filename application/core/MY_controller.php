<?php

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->db->where('email', $this->session->userdata('email'));
        //$this->db->where('password', md5($this->input->post('password')));

        $query = $this->db->get('users');

        $result = $query->result();

        if ($query->num_rows() == 1) {
            define('USERTYPE', $result[0]->usertype_id);
            define('USERID', $result[0]->id);
        } /*else {
            define('USERTYPE', 0);
        }*/
    }

}