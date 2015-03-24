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
        $data['todos'] = $this->Todo_model->get_todos();

        $this->load->view('/todo/todo_view', $data);
    }

    public function create()
    {
        $this->load->view('/todo/create');
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

