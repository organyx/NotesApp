<?php

class View
{
	
	/*
	$content_file - Page content;
	$template_file - Template;
	$data - Data. Filled in Model
	*/
	function generate($content_view, $template_view, $data = null)
	{
		
		
		if(is_array($data)) {
			// Converting Array elements to variables
			extract($data);
		}
		
		
		/*
		Hooking up Template with page layout
		*/
		include 'application/views/templates/'.$template_view;
	}
}
