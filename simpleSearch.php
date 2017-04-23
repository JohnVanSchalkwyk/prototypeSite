<?php

    include_once 'db.php';
    session_start();

    if((isset($_POST["event"])))
    {
           
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
                    echo "<div id='".$str."' class='col-sm-3 text-center'><h3>".$assoc["eventName"]."</h3><hr/><p>Field : ".$assoc0["fieldName"]."<br>Location : ".$assoc0["fieldAddress"]."<br>Time : ".$assoc["eventTimeFrom"]." till ".$assoc["eventTimeUntil"]."<br>Date : ".$assoc["eventDate"]."</p><button onclick='javascript:clearResult(".$str.")' class='btn btn-danger'>Clear</button></div>";
            
            }
            }

            
            

           
    }
            
      
    else
    {
        echo "Not Set";
    }
    


?>