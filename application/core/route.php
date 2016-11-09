<?php

class Route
{

	static function start()
	{
		// Controller and Default action
		$controller_name = 'Login';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// Get controller name
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// Get action name
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// Adding prefixes
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		/*
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
		*/

		// Fetching Model class

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// Fetching Controller class
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			
			//throw new Exception("Controller doesn't exist.", 1);
			
			Route::ErrorPage404();
		}
		
		// Creating controller
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// Calling controller action
			$controller->$action();
		}
		else
		{
			//throw new Exception("Action doesn't exist.", 1);
			
			Route::ErrorPage404();
			//echo "Function doesn't exist " . $controller->$action();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }

    function ErrorPage403()
    {
    	$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 403 Not Authorised');
		header("Status: 403 Not Authorised");
		header('Location:'.$host.'403');
    }
    
}
