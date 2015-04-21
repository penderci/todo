<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Penders
 * Date: 3/23/2015
 * Time: 10:00 PM
 */
class Todo extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            /*echo 'usertype => ';
            echo USERTYPE;
            die();*/

            $data['todos'] = $this->Todo_model->get_todos();

            $this->load->view('/todo/todo_view', $data);

        } else {
            redirect(base_url().'login');
        }
    }

    public function create()
    {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->view('/todo/create');
        } else {
            redirect(base_url().'login');
        }
    }

    public function validate()
    {
        $this->form_validation->set_rules("description", "To Do", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('/todo/create');
        } else {
            $description = $this->input->post('description');

            $this->Todo_model->insert($description);

            redirect (base_url().'todo');
            //$this->index();
        }
    }
}

