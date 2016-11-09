<?php

class Model
{
	
	public function get_data()
	{
		// todo
	}

	public function redirectWOStatusCode($url, $permanent = false)
	{
	    header('Location: ' . $url, true, $permanent ? 301 : 302);
	    exit();
	}

	public function redirect($url, $statusCode = 303)
	{
	   header('Location: ' . $url, true, $statusCode);
	   die();
	}
}