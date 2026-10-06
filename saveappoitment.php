<?php

include('dbconnectgroup07.php'); 
include "mylib.php";
$errors=array(); 
if(!preg_match("/^[A-Z]{3,5}||([0-9]){3,5}$/", $_POST['ci'])) 
{$errors[]="Please correct the coures ID";}
if(!preg_match("/^[A-Za-z\s]{1,60}$/", $_POST['cn'])) 
{$errors[]="Please correct the coures name";} 
if(!preg_match("/^[A-Za-z\s]{1,60}$/", $_POST['sn'])) 
{$errors[]="Please correct the Staff Name";} 

$date=$_POST['d'].'-'.$_POST['m'].'-'.$_POST['y'];
if($_POST['y']=='y' || $_POST['m']=='m' || $_POST['d']=='d'){
$errors[]="please select valid date....";}

	

$todaydat=time();
$purdate=mktime(0,0,0,$_POST['m'],$_POST['d'],$_POST['y']);

if(!checkdate($_POST['m'],$_POST['d'],$_POST['y']) ||
$purdate >$todaydat){$errors[]="It should be not after today date...";}



if(count($errors)==0){
$cdt=date ("Y-m-d H:i:s");
$date1=$_POST['y'].'-'.$_POST['m'].'-'.$_POST['d'];
  

echo "thank you ";
 }
 else { 
      DisplayErrors(); 
 }
?>
