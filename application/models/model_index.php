<?php
class Model_Index extends Model
{
    public function get_note_list()
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

}