
<?php
session_start();
include('dbconnect.php'); include('mylib.php');
include("header.php");
include('menu.php');

$errors=[];
if (!isset($_POST['m']) ){
	$errors[]="Please select the mood option ...";
	
}

if(!preg_match("/^[0-9]{3}$/",$_POST['rn'])){
	    $errors[]="Please correct the number room  {$_POST['rn']}  ";	
}
/* if(!preg_match("/^[1-5]{1}$/",$_POST['d'])){
	    $errors[]="Please correct the day number   {$_POST['d']}  ";	
} */
/* if($_POST['d']=='x')
	 $errors[]="Pleas Select the day"; */
 
if(!preg_match("/^[0-9]{2}$/",$_POST['tt'])){
	    $errors[]="Please correct the Time To  {$_POST['tt']}  ";	
}
if(!preg_match("/^[0-9]{2}$/",$_POST['tf'])){
	    $errors[]="Please correct the Time From  {$_POST['tf']}  ";	
}
if($_POST['cn']=='x'){$errors[]="please select the course ID.....";}
	$ft=$_POST['tf'].":00:00";
   $tt=$_POST['tt'].":00:00";
 $n_r="select * from OfficeHour where StaffID ='{$_POST['stid']}' and day ='{$_POST['d']}' and  TimeFrom = convert('$ft',Time) and TimeTo = convert('$tt',Time)";
	//echo $n_r;
	$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
    $m_r=mysqli_fetch_assoc($r);
    $m11=mysqli_num_rows($r);
	/* if($m11==0)
	{
		{$errors[]="the day and time is selected";}
	} */
	

if(count($errors)==0){
	$ft=$_POST['tf'].":00:00";
   $tt=$_POST['tt'].":00:00";
   if($ft==$tt)
   {$m=1;}
   else {
    $n_r="select * from OfficeHour where StaffID ='{$_POST['stid']}' and day ='{$_POST['d']}' and  TimeFrom >= convert('$ft',Time) and TimeTo <= convert('$tt',Time)";
	//echo $n_r;
	$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
    $m_r=mysqli_fetch_assoc($r);
    $m=mysqli_num_rows($r);
   }
	if($m==0)
	{
$ft=$_POST['tf'].":00:00";
$tt=$_POST['tt'].":00:00";
	//$clean_name = ucwords(strtolower(trim($_POST['cn'])));
	$clean_rn=$_POST['rn'];
	$q= "insert into OfficeHour (OHID,RoomNo,day,TimeFrom,TimeTo,mode, StaffID,courseID)";
	$q .= "values (NULL,'{$_POST['rn']}','{$_POST['d']}'";
	$q .= ",'$ft','$tt','{$_POST['m']}','{$_POST['stid']}','{$_POST['cn']}')";
	
	$r=mysqli_query($conn,$q) or die("Error in query $q" . mysqli_error($conn));
	//echo "data saved succefully";
	header("location:officHours.php?id={$_SESSION['SUID']}");
	}
	else
	 {
		 $errors[]="Please correct the Time From  {$_POST['tf']}  ";
		
		if(count($errors)!=0){
DisplayErrors();
		}
		
	}
} else {
	
	DisplayErrors();
}
include("footer.php");
?>



