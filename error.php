<?php
// This Script displays error message based on value of etc.
 switch ( $_GET['ec'] ) {
// login failure
case 0:
$message = "Your user name or password is incorrect!
<a href=index.php>Please try again.</a>";
break;
//session problem, for users who try to access a secured page without logging-in
case 1:
$message = "There was an authentication error. Please
<a href=index.php>log in </a> correctly.";
break;
// session problem - logging twice
case 2:
$message = "There was an authentication error. You should logout
 first Please<a href=logout.php>logout or change the user</a>";
break;
// bad datestamp
case 3:
$message = "You selected an invalid date range. Please
<a href=mnmnu.php>try again</a>";
break;
// default action
default:
$message = "There was an error performing the requested action. Please
<a href=index.php>log in </a> again.";
 break;
 }
 echo "<!DOCTYPE html><html><head><style type='text/css'>
 .err {font-family: Arial;font-size:13pt;font-weight:bold;color:red;
 background-color:#FFE6E6;width=900px;border:2px solid #008;
 margin:30px 300px;padding:10px;text-align:center}
 </style></head><body>";
$browsertitle="Error Page!....................................";
$rowtitle="Error!....................................";
 include("header.php");
 echo "<div class='err'>$message </div>";
include("footer.php");
?> 