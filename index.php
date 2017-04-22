<?php

    session_start();


?>

<!DOCTYPE HTML>
<html>


<head>
    <title>Milsig Paintball Events System</title>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="resources/style.css">
<script src="resources/functions.js"></script>
</head>
<body onload="init()">
    <div class="container-fluid">
        <div class="row">
            <div id="banner" class="col-sm-12"></div>
        </div>
        <div class="row">

        <div id="loginHeader" class="col-sm-12">
            <div style="float: right" class="col-sm-12 pull-right text-right">
                <a data-backdrop="static" class="btn btn-default btn-lg" data-toggle="modal" data-target="#loginModal">Login</a>

                <!-- Modal -->
                <div id="loginModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="login-wrap">
                                        
                                        <div class="login-html text-center">
                                            <button type="button" style="color:white" class="close" data-dismiss="modal">&times;</button>
                                            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                                            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                                            
                                            <div class="login-form">
                                                <div class="sign-in-htm">
                                                    <form method="post" action="signin.php">
                                                    <div class="group">
                                                        <label for="signin_user" class="label">Username</label>
                                                        <input id="signin_user" name="signin_user" type="text" class="input" required>
                                                    </div>
                                                    <div class="group">
                                                        <label for="signin_pass" class="label">Password</label>
                                                        <input id="signin_pass" name="signin_pass" type="password" class="input" data-type="password" required>
                                                    </div>
                                                    <div class="group">
                                                        <input id="signin_persist" name="signin_persist" type="checkbox" class="check" checked>
                                                        <label for="signin_persist"><span class="icon"></span> Keep me Signed in</label>
                                                    </div>
                                                    <div class="group">
                                                        <input type="submit" class="button" value="Sign In">
                                                    </div>
                                                    </form>

                                                </div>
                                                <div class="sign-up-htm">
                                                    <form method="post" action="signup.php">
                                                    <div class="group">
                                                        <label for="signup_user" class="label">Username</label>
                                                        <input id="signup_user" name="signup_user" type="text" class="input">
                                                    </div>
                                                    <div class="group">
                                                        <label for="signup_pass" class="label">Password</label>
                                                        <input id="signup_pass" name="signup_pass" type="password" class="input" data-type="password">
                                                    </div>
                                                    <div class="group">
                                                        <label for="signup_email" class="label">Email Address</label>
                                                        <input id="signup_email" name="signup_email" type="text" class="input">
                                                    </div>
                                                    <div class="group">
                                                        <input type="submit" class="button" value="Sign Up">
                                                    </div>
                                                    </form>
                                                    <div class="hr"></div>
                                                    <div class="foot-lnk">
                                                        <label for="tab-1">Already Member?</label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
            <!-- End Modal -->
        </div>
    </div>
    </div>
</div>

<!-- Notification Modal -->
<div id="notification" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notification</h4>
      </div>
      <div id="notification_body" class="modal-body">
      </div>
    </div>

  </div>
</div>
<!-- End Modal -->

<?php

    
        if(isset($_GET['notification']))
        {
            $code = $_GET['notification'];
            echo '<script type="text/javascript"> display("'.$code.'");</script>';
            
            
            
        }
        if(isset($_GET['success']))
        {
            $code = $_GET['success'];
            echo '<script type="text/javascript"> welcome("'.$code.'");</script>';
            
        }
        else if(isset($_COOKIE['persistUser']))
        {
            $code = json_decode($_COOKIE['persistUser']);
            echo '<script type="text/javascript"> welcome("'.$code[1].'");</script>';

        }
        else if(isset($_SESSION['user']))
        {
            $code = json_decode($_SESSION['user']);
            echo '<script type="text/javascript"> welcome("'.$code[1].'");</script>';
            
        }
        
?>
</body>



















</html>