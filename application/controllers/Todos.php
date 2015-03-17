<?php
class Todos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Todo_model');
    }

    public function index()
    {
        $data['todos'] = $this->Todo_model->get_todos();

        $data['title'] = 'To Do List';

        $this->load->view('templates/header', $data);
        $this->load->view('todo/index', $data);
        $this->load->view('templates/footer');
    }

    public function view()
    {
        $data['todo'] = $this->Todo_model->get_todos();
    }
}