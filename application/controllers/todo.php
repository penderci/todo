<?php
/**
 * Created by PhpStorm.
 * User: Penders
 * Date: 3/23/2015
 * Time: 10:00 PM
 */
class Todo extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
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

            $this->index();
        }
    }
}

