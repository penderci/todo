<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

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
            //$usertype = $this->User_model->get_usertype();*/

            $data = array(
                'email'=>$this->input->post('email'),
                'is_logged_in'=> 1 //,
               //'usertype'=>$usertype
            );
            $this->session->set_userdata($data);
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials','Incorrect username/password');
            return false;
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }

}