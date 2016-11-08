<?php

class Model
{
	
	public function get_data()
	{
		// todo
	}

	public function get_user_data($email)
	{	
			Global $NotesApp;

			$colname_User = "-1";
			if (isset($_SESSION['Username'])) 
			{
			  $colname_User = $_SESSION['Username'];
			}
			else
			{
				$colname_User = $email;
			}

			$sql=sprintf("SELECT userID, first_name, last_name, email, language, url, title, description, registration, approval, preview_thumb FROM users WHERE email = %s", GetSQLValueString($colname_User, "text"));
 
			$result=$NotesApp->query($sql);
			 
			if($result === false) 
			{
			  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $NotesApp->error, E_USER_ERROR);
			} 
			else 
			{
			  $totalRows = $result->num_rows;
			  $result->data_seek(0);
			  return $result;
			}		
	}
}