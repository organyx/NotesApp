<?php

    $GLOBALS['secure_password'] = "";

class Model_Register extends Model
{
    public function register()
    {   
        Global $NotesApp;

        $GLOBALS['secure_password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if(!$this->user_exists())
            {
                $sql=sprintf("INSERT INTO users (username, password, email) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($GLOBALS['secure_password'], "text"),
                       GetSQLValueString($_POST['email'], "text"));
 
                $result=$NotesApp->query($sql);
                if ($result === false) {
                    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $NotesApp->error, E_USER_ERROR);
                }
                else
                {
                    echo "Registration Succesful."; 
                    return "Registration Succesful.";   
                }
            }
            else
            {
                echo "Username is already taken."; 
                return "Username is already taken."; 
            }
    }

    public function user_exists()
    {
        Global $NotesApp;

        $query=sprintf("SELECT * FROM users WHERE username=%s", GetSQLValueString($_POST['username'], "text")); 
        $result = $NotesApp->query($query);
        if($result === false)
        {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $NotesApp->error, E_USER_ERROR);
        }
        else
        {
            $userdata = $result->fetch_assoc(); 
            if(isset($userdata))
            {
                extract($userdata);
                if($userdata['username'] == $_POST['username'])
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
    }

}