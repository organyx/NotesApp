<?php

class Controller_Login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function action_index()
    {
        session_start();
        if(IS_AJAX)
        {
            $this->model->login();

        }
        else
        {
            // $data = $this->model->login();
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
}
