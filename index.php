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
<script src="resources/js-webshim/minified/polyfiller.js"></script>
</head>
<body onload="init()">
    <div class="container-fluid">
        <div class="row">
            <div id="banner" class="col-sm-12"></div>
        </div>
        <div class="row">

        <div id="loginHeader" class="col-sm-12">
            <div class="col-sm-12 pull-right text-right">
                Not registered? Click<a data-backdrop="static"  id="signupbtn" class="btn" data-toggle="modal" data-target="#loginModal"><b>here!</b></a>
                <a data-backdrop="static" class="btn btn-default" id="signinbtn" data-toggle="modal" data-target="#loginModal">Login</a>

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
                                                        <input id="signup_user" name="signup_user" type="text" class="input" required>
                                                    </div>
                                                    <div class="group">
                                                        <label for="signup_pass" class="label">Password</label>
                                                        <input id="signup_pass" name="signup_pass" type="password" class="input" data-type="password" required>
                                                    </div>
                                                    <div class="group">
                                                        <label for="signup_email" class="label">Email Address</label>
                                                        <input id="signup_email" name="signup_email" type="text" class="input" required>
                                                    </div>
                                                    <div class="group">
                                                        <label for="signup_fname" class="label">Firstname</label>
                                                        <input id="signup_fname" name="signup_fname" type="text" class="input" required>
                                                    </div>
                                                    <div class="group">
                                                        <label for="signup_sname" class="label">Surname</label>
                                                        <input id="signup_sname" name="signup_sname" type="text" class="input" required>
                                                    </div>
                                                    <div class="group">
                                                        <input type="submit" class="button" value="Sign Up">
                                                    </div>
                                                    </form>
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
    <!-- Tab Section -->
<div class="row">
    <div class="col-sm-12 text-center">
        <ul class="nav nav-pills nav-justified">
            <li><a data-toggle="tab" href="#general">General Information</a></li>
            <li class="active"><a data-toggle="tab" href="#event">Find an Event</a></li>
            <li><a data-toggle="tab" id="dashTab" href="#dashboard">My Dashboard</a></li>
        </ul>

            <div class="tab-content">
                    <div id="general" class="toggles tab-pane fade">
                            
                                
                    </div>
                    <div id="event" class="toggles tab-pane fade in active text-center">
                        <div class="row" id="spacer"></div>
                           <div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" id="simplesearch" class="form-control" placeholder="Search for events..." />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" onclick="populateField()" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form id="advanced" class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="Date">Choose Date From:</label><br>
                                    <input id="date_from" name="date_from" type="date">
                                  </div>
                                   <div class="form-group">
                                    <label for="Date">Choose Date Until:</label><br>
                                    <input id="date_till" name="date_till" type="date">
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Field</label><br>
                                   <input id="field" name="field" list="fieldList">
                                        <datalist id="fieldList">
                                        </datalist>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Area</label><br>
                                    <input class="form-control" id="area" name="area" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" onclick="simpleSearch()" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
          

          </div>
         </div>
            <div id="dashboard" class="toggles tab-pane fade">
                                                        <ul class="nav nav-tab nav-justified">
                                
                                <li><a data-toggle="tab" href="#myevents">My Events</a></li>
                                <li class="active"><a data-toggle="tab" href="#dashProfile">My Profile</a></li>
                                <li><a data-toggle="tab" href="#myteams">My Teams</a></li>
                                </ul>

                                <div class="tab-content">
                                <div id="dashProfile" class="tab-pane fade in active">
                                    <div class="row" id="spacer"></div>
                                    <div class="row">
                                        <div style="border:solid yellow" class="col-sm-6 col-sm-offset-3">
                                                <h3 id="username" >Username</h3>
                                                <h5 id="name">Name</h5>
                                                
                                                <h5 id="sname">Surname</h5>
                                                
                                                <h5 id="email">Email</h5>                                            

                                        </div>


                                    </div>
                                </div>
                                <div id="myevents" class="tab-pane fade">
                                    <div id="eventContents" class="row">


                                        
                                    </div>


                                    <div id="spacer" class="row"></div>
                                    <div class="row">
                                        <button onclick="createNewEvent()" style="margin-bottom:1%" class="btn btn-default">Create Event</button>

                                                                                                <!-- Modal -->
                                                        <div id="createEventModal" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Create New Event</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <form method="POST" action="addNewEvent.php">
                                                                        <div class="form-group">
                                                                            <label for="event_name">Name of Event:</label>
                                                                            <input type="text" name="event_name" class="form-control" id="event_name" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_when">When:</label>
                                                                            <input type="date" name="date_when" class="form-control" id="date_when" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="add_from">Time(From):</label>
                                                                            <input type="time" name="add_from" class="form-control" id="add_from" required>
                                                                        </div>
                                                                         <div class="form-group">
                                                                            <label for="add_till">Time(Until):</label>
                                                                            <input type="time" name="add_till" class="form-control" id="add_till" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label for="contain">Field:</label><br>
                                                                    <input id="field" name="field" list="fieldList" required>
                                                                            <datalist id="fieldList">
                                                                            </datalist>
                                                                    </div>
                                                                        <button type="submit" class="btn btn-default">Submit</button>
                                                                        </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>

                                                        </div>
                                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <button onclick="bookEvent()" class="btn btn-default">Attend An Event</button>
                                                
                                                                                                <!-- Modal -->
                                                        <div id="bookEventModal" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Attend An Event</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="bookEventContent"></div>
                                                                    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>

                                                        </div>
                                                        </div>

                                        </div>
                                </div>
                                <div id="myteams" class="tab-pane fade">
          
                        <div class="col-sm-6 col-md-offset-3">

                            <h4>TEAM : WATER</h4>

                            <!-- ================================================================================ -->
                            <div>
                                <div class="row">

                                    <table class="table table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Donna R. Folse</td>
                                                <td>2012/05/06</td>
                                                <td>Admin</td>

                                            </tr>
                                            <tr>
                                                <td>Emily F. Burns</td>
                                                <td>2011/12/01</td>
                                                <td>Noob</td>
                                            </tr>
                                            <tr>
                                                <td>Andrew A. Stout</td>
                                                <td>2010/08/21</td>
                                                <td>Runner</td>
                                            </tr>
                                            <tr>
                                                <td>Mary M. Bryan</td>
                                                <td>2009/04/11</td>
                                                <td>Admin</td>
                                            </tr>
                                            <tr>
                                                <td>Mary A. Lewis</td>
                                                <td>2007/02/01</td>
                                                <td>Sniper</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- ================================================================================ -->


                        </div>
           
</div>
                                </div>
                                </div>
                                                                
                            
                    </div>
            </div>

    </div>

</div>
     <!-- End Tab -->
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
<footer>
</footer>


















</html>