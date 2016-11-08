<?php

class Controller_Register extends Controller
{
    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index()
    {   
        session_start();
        if(IS_AJAX)
        {
            $data = $this->model->register();
        }
        else
        {
            $this->view->generate('register_view.php', 'template_view.php');
        }
        
    }
}