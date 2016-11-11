<?php

class Model_Register extends Model
{
    public function register()
    {   
        Global $NotesApp;

        $pass_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if($this->check_user_input())
        {
            if(!$this->user_exists())
            {
                $sql=sprintf("INSERT INTO users (username, password, email) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($pass_hash, "text"),
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

    public function min_max_pass($password)
    {
        $min = 8;
        $max = 32;
         if (strlen($password) > $max)
         {
           return 1;
         } 
         elseif (strlen($password) < $min)
         {
           return -1;
         }
         else
         {
           return 0;
         }
    }

    public function check_user_input()
    {
        Global $WebCatalogue;

        if(empty($_POST['username']))
        {
            echo "Please enter your Username.";
            return false;
        }

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {    
        }
        else {
            echo "Please enter a valid email.";
            return false;
        }

        if(empty($_POST['password'])) 
        {
            echo "Password field cannot be empty.";
            return false;
        }

        switch ($this->min_max_pass($_POST['password'])) 
        {
                case '-1':
                    echo "Password is too short.";
                    return false;
                    break;
                case '1':
                    echo "Password is too long.";
                    return false;
                    break;
        }

        return true;
    }

}