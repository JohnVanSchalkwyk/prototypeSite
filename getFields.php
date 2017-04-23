<?php

    include_once 'db.php';
    session_start();


       
        $var = $mysqli->prepare("SELECT * FROM fields");
        $var->execute();
        $result = $var->get_result();
        
        while($assoc = $result->fetch_assoc())
            {

                echo "<option value='".$assoc["fieldName"]."'>";
 
            }
?>