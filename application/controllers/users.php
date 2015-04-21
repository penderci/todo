<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            if ($this->session->userdata('usertype') == '2' || $this->session->userdata('usertype') == '3') {
                $data = $this->get_data_from_post();
                $data['users'] = $this->User_model->get_users();

                $this->load->view('/users/users_view', $data);
            } else {
                redirect (base_url().'todo');
            }

        } else {
            redirect(base_url().'login');
        }

    }

    /*public function create(){
        if ($this->session->userdata('is_logged_in')) {
            $this->load->view('/todo/create');
        } else {
            redirect(base_url().'login');
        }
    }*/

    public function get_data_from_post(){
        $data['email'] = $this->input->post('email',TRUE);
        $data['password'] = $this->input->post('password',TRUE);
        return($data);
    }

    public function submit(){

        $this->form_validation->set_rules("email", "Email", "required|xss_clean");
        $this->form_validation->set_rules("password", "Password", "required|min_length[6]|xss_clean");

        if ($this->form_validation->run() == FALSE) {
            $this->index();
            //$this->load->view('/users/users_view');
        } else {
            $data = $this->get_data_from_post();
            $this->User_model->insert_user($data);
            redirect(base_url().'users');
            /*$description = $this->input->post('description');

            $this->Todo_model->insert($description);

            redirect (base_url().'todo');*/
            //$this->index();
        }
    }

    public function get_data_from_db($user_id){
        $query=$this->User_model->get_where($user_id);
        foreach($query ->result() as $row){
            $data['id'] = $row->id;
            $data['email'] = $row->email;
            $data['password'] = null;
        }
        return($data);

        //op 4:43 in video 2 over CRUD, hier verder werken

    }

    public function edit(){
        $update_id = $this->uri->segment(3);
        $data= $this->get_data_from_db($update_id);
        $this->load->view('/users/edit',$data);
    }

    public function update(){
        print_r($_POST);

        $this->form_validation->set_rules("email", "Email", "required|xss_clean");
        $this->form_validation->set_rules("password", "Password", "min_length[6]|xss_clean");

        if ($this->form_validation->run() == FALSE) {
            $this->edit();
            //$this->load->view('/users/users_view');
        } else {
            if ($this->input->post('password') != null) {
                $data = $this->get_data_from_post();
                $data['id'] = $this->input->post('id',TRUE);
            } else {
                $data['id'] = $this->input->post('id',TRUE);
                $data['email'] = $this->input->post('email',TRUE);
            }

            //print_r($data);
           // die();
            $this->User_model->update_user($data);
            redirect(base_url().'users');
            /*$description = $this->input->post('description');

            $this->Todo_model->insert($description);

            redirect (base_url().'todo');*/
            //$this->index();
        }
    }

    public function delete(){
        $this->User_model->delete_user();
        redirect(base_url().'users');
    }
}