<?php
    
    include_once 'db.php';
    session_start();


    if(isset($_POST['data']))
    {
        $data = json_decode($_POST['data']);
        $var = $mysqli->prepare("SELECT * FROM eventslist WHERE userID = ?");
        $var->bind_param("i",$data[0]);
        $var->execute();
        $result = $var->get_result();

        echo '<table class="table table-bordered" style="width:100%">';
        echo '<tr><h3><b>Events Attending :</b></h3></tr>';
        while($assoc = $result->fetch_assoc())
        {
            $var2 = $mysqli->prepare("SELECT * FROM events WHERE eventID = ?");
            $var2->bind_param("i",$assoc["eventID"]);
            $var2->execute();
            $result2 = $var2->get_result();
            $assoc2 = $result2->fetch_assoc();

            $var3 = $mysqli->prepare("SELECT * FROM fields WHERE fieldID = ?");
            $var3->bind_param("i",$assoc2["eventFieldID"]);
            $var3->execute();
            $result3 = $var3->get_result();
            $assoc3 = $result3->fetch_assoc();


              echo "<tr>";
                echo "<td style='padding: 0.3em'>Event Name: ". $assoc2['eventName']."</td>";
                echo "<td style='padding: 0.3em'>Field: " .$assoc3['fieldName']. " </td>";
                echo "<td style='padding: 0.3em'>Location: " .$assoc3['fieldAddress']. " </td>";
                echo "<td style='padding: 0.3em'>Date: " .$assoc2['eventDate']. "</td>";
                echo "<td style='padding: 0.3em'>Time: " .$assoc2['eventTimeFrom']." to " .$assoc2['eventTimeUntil']. " </td>";
                echo "</tr>";

        }

        echo "</table><br/>";
    }
        
       


?>