<?php
/**
 * Created by PhpStorm.
 * User: Penders
 * Date: 3/23/2015
 * Time: 10:00 PM
 */
class Todo extends CI_Controller{
    public function index(){
        $this->load->view('todo_view');
    }
}