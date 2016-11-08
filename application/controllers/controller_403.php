<?php

class Controller_403 extends Controller
{
	
	function action_index()
	{
		$this->view->generate('403_view.php', 'template_view.php');
	}

}
