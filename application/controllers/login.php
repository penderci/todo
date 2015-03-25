<?php
class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('/login/login_view');
    }

    public function login_validation(){
        //xss_clean Provides Cross Site Script Hack filtering.
        $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('password','Password','required|md5|trim');

        if($this->form_validation->run()){
            //$this->load->view('/todo/todo_view');
            redirect(base_url().'todo');
        } else {
            $this->load->view('/login/login_view');

        }
    }

    public function validate_credentials(){
        if($this->User_model->can_login()){
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials','Incorrect username/password');
            return false;
        }
    }

}