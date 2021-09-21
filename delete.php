<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    if (!$_GET['id']) 
    {
        //print error
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else 
    {
        //get the id
        $id = $_GET['id'];
        //call delete function
        $result = $crud->deleteAttendee($id);

        if ($result)
        {
            header("Location: viewrecords.php");
        }
        else 
        {
            //print error
        include 'includes/errormessage.php';
        }
    }


?>
