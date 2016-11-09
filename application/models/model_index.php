<?php
class Model_Index extends Model
{
    public function get_note_list()
    {
        Global $NotesApp;

            if(isset($_SESSION['User_id']))
            {
                $query=sprintf("SELECT * FROM notes WHERE created_by = %s", GetSQLValueString($_SESSION['User_id'], "text")); 
                $result = $NotesApp->query($query);
                if($result === false)
                {
                    trigger_error('Wrong SQL: ' . $query . ' Error: ' . $NotesApp->error, E_USER_ERROR);
                }
                else
                {
                    // $userdata = $result->fetch_assoc(); 
                    $notes = array();
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $notes[] = $row;
                    }
                    $result->free();
                    echo json_encode($notes);
                    return json_encode($notes);
                }
            }
    }

    public function get_test_user()
    {
        Global $NotesApp;

        $query=sprintf("SELECT * FROM notes INNER JOIN users ON notes.created_by = users._id"); 
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

    public function add_note()
    {
        Global $NotesApp;

        if(isset($_SESSION['User_id']))
        {
            if(isset($_POST['note']))
            {
                $sql=sprintf("INSERT INTO notes (note_text, created_by) VALUES (%s, %s)",
                       GetSQLValueString($_POST['note'], "text"),
                       GetSQLValueString($_SESSION['User_id'], "text"));
 
                $result=$NotesApp->query($sql);
                if ($result === false) {
                    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $NotesApp->error, E_USER_ERROR);
                }
                else
                {
                    // echo "Note Added Succesfully"; 
                    return "Note Added Succesfully";   
                }
            }
        }
    }

}