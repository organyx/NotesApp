<?php
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		// todo	
	}

	function action_logout()
    {
        session_start();
        session_destroy();
        header('Location:/login/');
    }
}
