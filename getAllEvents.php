<?php
    
    include_once 'db.php';
    session_start();


    if(isset($_POST['data']))
    {
        
            $var2 = $mysqli->prepare("SELECT * FROM events");
            $var2->execute();
            $result2 = $var2->get_result();
           while($assoc2 = $result2->fetch_assoc()){

            $var3 = $mysqli->prepare("SELECT * FROM fields WHERE fieldID = ?");
            $var3->bind_param("i",$assoc2["eventFieldID"]);
            $var3->execute();
            $result3 = $var3->get_result();
            $assoc3 = $result3->fetch_assoc();


              echo "<p>";
                echo "<b>Event Name: ". $assoc2['eventName']."</b><br>";
                echo "<i>Field: " .$assoc3['fieldName']. " </i<br><br>";
                echo "<i>Location: " .$assoc3['fieldAddress']. " </i><br>";
                echo "<i>Date: " .$assoc2['eventDate']. "</i><br>";
                echo "<i>Time: " .$assoc2['eventTimeFrom']." to " .$assoc2['eventTimeUntil']. " </i><br><br>";
                echo "<button onclick='javascript:queryBook(".$assoc2["eventID"].")' class='btn btn-info'>Book</button>";
                echo "<p>";
                echo "<hr/>";

        }
    }

    
        
       


?>