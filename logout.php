<?php
ini_set('include_path', 'includes_laluna');
session_start();
if(session_destroy()) // Destroying All Sessions
{
setcookie("persistUser", "", time() - 3600);
setcookie("user", "", time() - 3600);

header("Location: index.php?notification=Logged Out Successfully"); // Redirecting To Home Page
}
?>