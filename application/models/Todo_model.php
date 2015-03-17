<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_todo()
    {
        $query = $this->db->get_where('todo');
        return $query->row_array();
    }
}

