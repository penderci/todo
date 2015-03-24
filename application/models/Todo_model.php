<?php
/**
 * Created by PhpStorm.
 * User: Penders
 * Date: 3/23/2015
 * Time: 11:31 PM
 */
class Todo_model extends CI_Model{
    public function get_todos(){
       $query = $this->db->query("SELECT * FROM todo");
        return $query->result();
    }

    public function insert($description){
        $query_str = "INSERT INTO todo (description) VALUES (?)";

        $this->db->query($query_str, $description);
    }
}
