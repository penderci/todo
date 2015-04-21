<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
        $data = array(
            'description' => $description ,
            'user_id' => USERID
        );

        $this->db->insert('todo', $data);

        // $query_str = "INSERT INTO todo (description,user_id) VALUES (?,?)";

       // $this->db->query($query_str, $description, USERID);
    }
}
