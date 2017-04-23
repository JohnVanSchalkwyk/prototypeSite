<?php

    include_once 'db.php';
    session_start();

    if(isset($_POST["data"]))
    {
       
        $var = $mysqli->prepare("SELECT * FROM users WHERE userID = ?");
        $var->bind_param("i",$_POST["data"]);
        $var->execute();
        $result = $var->get_result();
        
        $assoc = $result->fetch_assoc();
                $arr = array($assoc["username"],$assoc["fname"],$assoc["sname"],$assoc["email"]);
                echo json_encode($arr);
    }
?>