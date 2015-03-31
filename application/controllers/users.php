<?php
class Users extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            $data = $this->get_data_from_post();
            $data['users'] = $this->User_model->get_users();

            $this->load->view('/users/users_view',$data);

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

}