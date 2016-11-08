<?php

class Controller_Index extends Controller
{
    function __construct()
    {
        $this->model = new Model_Index();
        $this->view = new View();
    }

    function action_index()
    {   
        session_start();
        if(IS_AJAX)
        {
            $data = $this->model->get_note_list();
        }
        else
        {
            $data = $this->model->get_note_list();
            $this->view->generate('index_view.php', 'template_view.php', $data);
        }
    }

    function action_logout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }
}