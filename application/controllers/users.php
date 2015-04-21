<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
           // if ($this->session->userdata('usertype') == '2' || $this->session->userdata('usertype') == '3') {
            //$usertype = USERTYPE;

            if (USERTYPE == '2' || USERTYPE == '3') {

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
        } else {
            $data = $this->get_data_from_post();
            $this->User_model->insert_user($data);
            redirect(base_url().'users');
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

            $this->User_model->update_user($data);
            redirect(base_url().'users');

        }
    }

    public function delete(){
        $this->User_model->delete_user();
        redirect(base_url().'users');
    }
}