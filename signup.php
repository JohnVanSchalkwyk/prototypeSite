<?php
    require_once 'db.php';

    session_start();

    
    if(isset($_POST['signup_user']) && isset($_POST['signup_pass']) && isset($_POST['signup_email']) && isset($_POST['signup_fname']) && isset($_POST['signup_sname']))
    {
        
        $user = $_POST['signup_user'];
        $pass = $_POST['signup_pass'];
        $email = $_POST['signup_email'];
        $fname = $_POST['signup_fname'];
        $sname = $_POST['signup_sname'];

        $var2 = $mysqli->prepare("INSERT INTO users (username,email,fname,sname,password) VALUES (?,?,?,?,?)");
        
        $var2->bind_param("sssss",$user,$email,$fname,$sname,$pass);
        if($var2->execute())
        {
                //Run another request to get the userID for session
                $id = $var2->insert_id;
                $arr = array($id,$fname);
                $_SESSION["user"] = json_encode($arr);
                $mysqli->close();
                $var2->close();
                header("Location: index.php?notification=Successfully Registered");
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
        header("Location: index.php?notification=Error with User Particulars");
        exit();
    }

?>