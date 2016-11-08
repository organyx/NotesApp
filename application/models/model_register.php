<?php

    $GLOBALS['flag'] = false;
    $GLOBALS['secure_password'] = "";
    $GLOBALS['file'] = "";

class Model_Register extends Model
{
    public function check_user_input()
    {
        Global $NotesApp;

        if(empty($_POST['username']))
        {
            echo "Please enter your name.";
            return false;
        }

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {    
        }
        else {
            echo "Please enter a valid email.";
            return false;
        }

        $login_check_query = sprintf("SELECT email FROM `users` WHERE email=%s", GetSQLValueString($_POST['email'], "text"));
        $login_check = $NotesApp->query($login_check_query);
        if($login_check === false)
        {
            trigger_error('Wrong SQL: ' . $login_check_query . ' Error: ' . $NotesApp->error, E_USER_ERROR);
        }
        else
        {
            $login_check->data_seek(0);
            $login_found_user = $login_check->num_rows;
        }

      //if there is a row in the database, the username was found - can not add the requested username
        if($login_found_user){
            echo "User Already Exists.";
            return false;
        }

        if(empty($_POST['password'])) 
        {
            echo "Password field cannot be empty.";
            return false;
        }

        $GLOBALS['secure_password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

        return true;
    }

    public function register()
    {   
        Global $NotesApp;

        $GLOBALS['secure_password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // if($this->check_user_input())
        // {
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
        // } 
        // else
        // {
        //     //echo "Registration Failed.";
        //     return "Registration Failed.";
        // }
        // return false;
    }

}