<?php

class Model_Login extends Model
{
    public function login()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
            {
                $loginUsername=$_POST['username'];
                $password = $_POST['password'];
                $redirectLoginSuccess = "/";
                $redirectLoginFailed = "/";

                $userinfo = $this->get_user($loginUsername);

                if(password_verify($password, $userinfo['password']))
                {
                    $loginFoundUser = true;
                    // echo "User exists";
                }
                else
                {
                    $loginFoundUser = false;
                    echo "Username / Password is incorrect"; 
                }

                if($loginFoundUser) 
                { 
                    if (PHP_VERSION >= 5.1) {
                        session_regenerate_id(true);
                    } else {
                        session_regenerate_id();
                    }
                    $_SESSION['User_id'] = $userinfo['_id'];
                    $_SESSION['Username'] = $loginUsername;
                    // echo "Login successful";
                    flush();
                    header('Location:'.$redirectLoginSuccess);
                    exit();
                    // $this->redirect($redirectLoginSuccess);
                }
                
            }
            // else
            // {
            //     $data["login_status"] = "";
            // }
        // echo "Login Failed."; 
        // return $data["login_status"];
    }

    public function get_user($username)
    {
        Global $NotesApp;

        $query=sprintf("SELECT * FROM users WHERE username=%s", GetSQLValueString($username, "text")); 
        $result = $NotesApp->query($query);
        if($result === false)
        {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $NotesApp->error, E_USER_ERROR);
        }
        else
        {
            $userdata = $result->fetch_assoc(); 
            return $userdata;
        }
    }
}