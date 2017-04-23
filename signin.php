<?php
    session_start();
    require_once("db.php");


    if(isset($_POST["signin_user"]) && isset($_POST["signin_pass"]))
    {
        $user = $_POST["signin_user"];
        $pass = $_POST["signin_pass"];
        $persist = $_POST["signin_persist"];
       

          if($mysqli->connect_error)
        {
            die("Connection failed: " . $mysqli->connect_error);
        }

             if($query = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?"))
             {
             
             $query->bind_param("ss",$user,$pass);
             $query->execute();
             $result = $query->get_result();

             if($result->num_rows === 1)
             {
                 $data = $result->fetch_assoc();

                 //Set persistence
                 if($persist == "on")
                 {
                 $day_of_expiry = time() + 60 * 60 * 24 * 30;

                 $arr = array($data["userID"],$data["fname"]);
                 setcookie("persistUser",json_encode($arr),$day_of_expiry);
                 }
                 else
                 {
                      $arr = array($data["userID"],$data["fname"]);
                      setcookie("user",json_encode($arr));
                 }
                
                $query->close();
                $mysqli->close();
                 header("Location: index.php?success=" .$data["fname"]);
                 exit();



             }
             else
             {
                $query->close();
                $mysqli->close();
                header("Location: index.php?notification=Invalid Username/Password");
                exit();
             }
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
        header("Location: index.php?notification=Unable to sign-in");
        exit();
    }




?>