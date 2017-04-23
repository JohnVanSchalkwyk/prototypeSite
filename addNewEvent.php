<?php
    require_once 'db.php';

    session_start();

    
    if(isset($_POST['event_name']) && isset($_POST['date_when']) && isset($_POST['add_from']) && isset($_POST['add_till']) && isset($_POST['field']))
    {
        
        $event = $_POST['event_name'];
        $date = $_POST['date_when'];
        $timefrom = $_POST['add_from'];
        $timetill = $_POST['add_till'];
        $field = $_POST['field'];


        $var = $mysqli->prepare("SELECT * FROM fields WHERE fieldName = ?");
        $var->bind_param("s",$field);
        $var->execute();
        $result = $var->get_result();
        $assoc = $result->fetch_assoc();



        $var2 = $mysqli->prepare("INSERT INTO events (eventDate,eventTimeFrom,eventTimeUntil,eventFieldID,eventName) VALUES (?,?,?,?,?)");
        
        $var2->bind_param("sssis",$date,$timefrom,$timetill,$assoc["fieldID"],$event);
        if($var2->execute())
        {
                
                $mysqli->close();
                $var2->close();
                header("Location: index.php?notification=Successfully Added Event");
                exit();
                
        }
        else
        {
                $msg = $mysqli->error;
                $mysqli->close();
                header("Location: index.php?notification=".$msg);
                exit();
        }      
            
    }
    else
    {
        header("Location: index.php?notification=Error");
        exit();
    }

?>