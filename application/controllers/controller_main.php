<?php

class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    function action_index()
    {   
        session_start();
        if(IS_AJAX)
        {
            $this->model->add_note();
            $data = $this->model->get_note_list();
            // $this->view->generate('index_view.php', 'template_view.php', $data);
        }
        else
        {
            $data = $this->model->get_note_list();
            $this->view->generate('main_view.php', 'template_view.php', $data);
        }
    }


}