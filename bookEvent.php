<?php

    include_once 'db.php';
    session_start();

    if(isset($_POST["data"]))
    {
       $arr = json_decode($_POST["data"]);
        $var = $mysqli->prepare("SELECT * FROM eventslist WHERE userID = ?");
        $var->bind_param("i",$arr[0]);
        $var->execute();
        $result = $var->get_result();
        $attending = true;
        while($assoc = $result->fetch_assoc())
        {
            if($assoc["eventID"] == $arr[1])
            {
                $attending = false;
            }

        }

        if($attending == false)
        {
            echo "ALREADYBOOKED";
        }
        else
        {
            //Add to list
            $var2 = $mysqli->prepare("INSERT INTO eventslist (eventID,userID) VALUES(?,?)");
            $var2->bind_param("ii",$arr[1],$arr[0]);
            if($var2->execute())
            {
                echo "Success";
            }
        }

                
    }
    else
    {
        echo "NULL";
    }
?>