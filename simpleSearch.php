<?php

    include_once 'db.php';
    session_start();

    if((isset($_POST["event"])))
    {
        $enabled;
        if(isset($_COOKIE['user']) || isset($_COOKIE['persistUser']))
        {
            $enabled = "";
        }
        else
        {
            $enabled = "disabled";
        }
           
            $var = $mysqli->prepare("SELECT * FROM events WHERE eventName LIKE CONCAT('%',?,'%')");
            $var->bind_param("s",$_POST["event"]);
            $var->execute();
           

            $result = $var->get_result();
            while($assoc = $result->fetch_assoc())
            {
                
                 $var2 = $mysqli->prepare("SELECT * FROM fields WHERE fieldID = ?");
                $var2->bind_param("i",$assoc["eventFieldID"]);
                $var2->execute();
            
            if($result2 = $var2->get_result())
            {
               
           
                    $assoc0 = $result2->fetch_assoc();
                    $uniqueID = uniqid();
                    $str = "_".$uniqueID;
                    echo "<div id='".$str."' class='col-sm-3 text-center'><h3>".$assoc["eventName"]." <button style='color:white' onclick='javascript:clearResult(".$str.")' class='close' >&times</button></h3><hr/><p>Field : ".$assoc0["fieldName"]."<br>Location : ".$assoc0["fieldAddress"]."<br>Time : ".$assoc["eventTimeFrom"]." till ".$assoc["eventTimeUntil"]."<br>Date : ".$assoc["eventDate"]."</p><button onclick='javascript:queryBook(".$assoc["eventID"].")' class='btn btn-info' ".$enabled." >Book</button><br></div>";
            
            }
            }

            
            

           
    }
            
      
    else
    {
        echo "Not Set";
    }
    


?>