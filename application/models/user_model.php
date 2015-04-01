<?php
class User_model extends CI_Model{
    public function can_login(){
        $this->db->where('email',$this->input->post('email'));
        $this->db->where('password',md5($this->input->post('password')));

        $query = $this->db->get('users');

        if ($query->num_rows()== 1) {
            return true;
        } else {
            return false;
        }
    }

    public function get_users(){
        $query = $this->db->query("SELECT * FROM users");
        return $query->result();
    }

    public function insert_user($data){
        $data['password'] = md5($data['password']);
        $this->db->insert('users',$data);
        return;
    }

    public function update_user($data){
        $data['password'] = md5($data['password']);
        $this->db->where('id',$data['id']);
        $this->db->update('users',$data);
    }

    public function delete_user(){
        //zoekt in de url naar x in  : contoller/method/x : vb uwers/delete_user/2
        $this->db->where('id',$this->uri->segment(3));
        $this->db->delete('users');

    }

    function get_table() {
        $table = "users";
        return $table;
    }

    function get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query=$this->db->get($table);
        return $query;
    }
}