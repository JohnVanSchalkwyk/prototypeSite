<?php

    include_once 'db.php';
    session_start();

    if((isset($_GET["date_from"]) && isset($_GET["date_till"])) || isset($_GET["field"])  || isset($_GET["area"]))
    {
        if($_GET["date_from"] != "" && $_GET["date_till"] != "")
        {
            $variable = $mysqli->prepare("SELECT * FROM events WHERE eventDate BETWEEN ? AND ?");
            $variable->bind_param("ss",$_GET["date_from"],$_GET["date_till"]);
            $variable->execute();
            if($res0 = $variable->get_result())
            {
                while($assoc0 = $res0->fetch_assoc())
                {
                    $variable2 = $mysqli->prepare("SELECT * FROM fields WHERE fieldID = ?");
                    $variable2->bind_param("i",$assoc0["eventFieldID"]);
                    $variable2->execute();

                    if($res11 = $variable2->get_result())
                    {
                        $assoc11 = $res11->fetch_assoc();
                         $uniqueID = uniqid();
                    $str = "_".$uniqueID;
                        echo "<div id=".$str." class='col-sm-3 text-center'><h3>".$assoc0["eventName"]."</h3><hr/><p>Field : ".$assoc11["fieldName"]."<br>Location : ".$assoc11["fieldAddress"]."<br>Time : ".$assoc0["eventTimeFrom"]." till ".$assoc0["eventTimeUntil"]."<br>Date : ".$assoc0["eventDate"]."</p><button onclick='javascript:clearResult(".$str.")' class='btn btn-danger'>Clear</button></div>";
            
                    }
                }
            }


        }
        else if($_GET["field"] != "")
        {
            
            $var = $mysqli->prepare("SELECT * FROM fields WHERE fieldName = ?");
            $var->bind_param("s",$_GET["field"]);
            $var->execute();
           

            $result = $var->get_result();
            $assoc = $result->fetch_assoc();

            $fieldID = $assoc["fieldID"];
            $fieldAddr = $assoc["fieldAddress"];
            

            $var2 = $mysqli->prepare("SELECT * FROM events WHERE eventFieldID = ?");
            $var2->bind_param("i",$fieldID);
            $var2->execute();
            
            if($result2 = $var2->get_result())
            {
               
            while($assoc2 = $result2->fetch_assoc())
            {
                 $uniqueID = uniqid();
                    $str = "_".$uniqueID;
                 
                    echo "<div id=".$str." class='col-sm-3 text-center'><h3>".$assoc2["eventName"]."</h3><hr/><p>Field : ".$_GET["field"]."<br>Location : ".$fieldAddr."<br>Time : ".$assoc2["eventTimeFrom"]." till ".$assoc2["eventTimeUntil"]."<br>Date : ".$assoc2["eventDate"]."</p><button onclick='javascript:clearResult(".$str.")' class='btn btn-danger'>Clear</button></div>";
            }
            }
            else
            {
                echo "No results found";
            }
            }
        else if($_GET["area"] != "")
        {
            
                $v = $mysqli->prepare("SELECT * FROM fields WHERE fieldAddress LIKE CONCAT('%',?,'%')");
                $v->bind_param("s",$_GET["area"]);
                $v->execute();

                if($res = $v->get_result())
                {
                    
                   while($as = $res->fetch_assoc())
                   {
                   
                    $v2 = $mysqli->prepare("SELECT * FROM events WHERE eventFieldID = ?");
                    $v2->bind_param("i",$as["fieldID"]);
                    $v2->execute();
                    
                    if($res2 = $v2->get_result())
                    {
                        while($as2 = $res2->fetch_assoc())
                        {
                             $uniqueID = uniqid();
                    $str = "_".$uniqueID;
                            echo "<div id=".$str." class='col-sm-3 text-center'><h3>".$as2["eventName"]."</h3><hr/><p>Field : ".$as["fieldName"]."<br>Location : ".$as["fieldAddress"]."<br>Time : ".$as2["eventTimeFrom"]." till ".$as2["eventTimeUntil"]."<br>Date : ".$as2["eventDate"]."</p><button onclick='javascript:clearResult(".$str.")' class='btn btn-danger'>Clear</button></div>";
                        }
                    }
                    else
                    {
                        echo "No results found";
                    }
                   }

                }
                else
                {
                    echo "No results found";
                }
        }
    }
    else
    {
        echo "Not Set";
    }
    


?>