<?php

    include_once 'db.php';
    session_start();

    if(isset($_POST["data"]))
    {
       $arr = json_decode($_POST["data"]);
        $var = $mysqli->prepare("SELECT * FROM users WHERE userID = ?");
        $var->bind_param("i",$arr[0]);
        $var->execute();
        $result = $var->get_result();
        
        $assoc = $result->fetch_assoc();
        if($assoc["authLevel"] != 3)
        {
            echo false;
        }
        else
        {
            echo true;
        }
                
    }
?>