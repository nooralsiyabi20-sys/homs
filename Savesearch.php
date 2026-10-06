



<?php
include('dbconnectgroup07.php'); 
include "mylib.php";
$errors=array(); 
if($_POST['ci']=='x'){$errors[]="please select the Course id.....";}
if($_POST['cn']=='x'){$errors[]="please select the Course Name.....";}



if(count($errors)==0){

echo "thank you ";
//header("location:Appointment.php");
} else{
DisplayErrors();
	}		


?>



