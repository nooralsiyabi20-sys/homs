<?php
include("header.php");
include("arrays.php");
include("dbconnect.php");
include("mylib.php");
?> 
<!DOCTYPE html>
<html>
 
 
 style>
li { display:inline; list-style-type:none; padding-right:20px;
</style>
       <li><a href="index.php"><img src='home.PNG' width=20 height=20></a></li>
      <li><a href="department.php">Department</a></li>
      <li> <a href="ohms1.php">OHMS</a></li>
	  <li><a href="aboutUs1.php">About us</a></li>
      <li><a href="contactUs.php">Contact us</a></li>
    
    <div class="img-container" >
      <img src="officeupdate.png" width="540" height="150">
    </div>
</html>

<?php
$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>New detailes of Office houre</h2>\n";
//echo"<pre>";print_r($_POST);echo"</pre>";
$errors=[];
if(!preg_match("/^[0-9]{3}$/",($_POST['rn']))) { 
$errors[]="Correct Room Number ....... "; 
}

/*
if(!preg_match("/^[A-Za-z]{4}[0-9]{3,6}$/",$_POST['cid'])){
	    $errors[]="Please correct the course Id $mo {$_POST['cid']} $mc ";
}*/
if($_POST['d']=='x')
	 $errors[]="Pleas Select the day";


if(count($errors)==0){

	     $clean_rn=$_POST['rn'];
	     $clean_ci=ucfirst(strtoupper(trim($_POST['cid'])));
		 $q="UPDATE  OfficeHour  SET";
         $q.=" RoomNo ='{$_POST['rn']}', day ='{$_POST['d']}', TimeFrom ='{$_POST['tf']}', TimeTo ='{$_POST['tt']}', mode ='{$_POST['m']}', StaffID ='{$_POST['sid']}', courseID ='{$_POST['cid']}' WHERE OHID= '{$_POST['OHID']}'";

		 $r=mysqli_query($conn,$q)or die("Error in the Query$q<br>".mysqli_error($conn));
		 echo"data saved succefully";
		header("location:officHours.php?id={$_POST['sid']}");
}else{
	
	DisplayErrors();
}
	






















include("footer.php");
?>