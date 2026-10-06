<?php
include("header.php");
include("arrays.php");
include("dbconnect.php");
include("mylib.php");
?> 
<!DOCTYPE html>
<html>
 
 <body>
     <a href="index.php"><img src='home.PNG' width=30 height=30></a> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="department.php">Department</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="ohms1.php">OHMS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="aboutUs.php">About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="contactUs.php">Contact us</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="login.php">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="img-container" >
      <img src="officeupdate.png" width="540" height="150">
    </div>
  </body>
</html>

<?php
$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>New detailes of student</h2>\n";
//echo"<pre>";print_r($_POST);echo"</pre>";
$errors=[];
///if(!preg_match("/^[e]([0-9]){3,5}$/",($_POST['stid']))) { 
// $errors[]="Correct Staff ID ....... "; 
//}

if(!preg_match("/^[A-Za-z\s\-](3,10)$/",$_POST['stuna'])){
	    $errors[]="Please correct the name $mo {$_POST['cn']} $mc ";
}
///if(!filter_var($_POST['ste'], FILTER_VALIDATE_EMAIL)) { 
/// $errors[]="Please correct the e-mail.."; 
//}

///if(!preg_match("/^[0-9](3,10)$/",$_POST['stph'])){
	   // $errors[]="Please correct the phone number $mo {$_POST['stph']} $mc ";
///if(!preg_match("/^[0-9](3,10)$/",$_POST['re'])){
	    //$errors[]="Please correct the residence ID $mo {$_POST['re']} $mc ";
//if(!preg_match("/^[0-9](3,4)$/",$_POST['rn'])){
///	    $errors[]="Please correct the number room $mo {$_POST['rn']} $mc ";		
//}	
if(count($errors)==0){
	     $clean_sn=ucfirst(strtolower(trim($_POST['cn'])));
		 //$clean_sp=ucfirst(strtolower(trim($_POST['stph'])));
		 //$clean_re=ucfirst(strtolower(trim($_POST['re'])));
		 ///$clean_rn=ucfirst(strtolower(trim($_POST['rn'])));
		 //$clean_sti=ucfirst(strtolower(trim($_POST['stid'])));
		 $q="update staff set sn='$clean_sn',ci='{$_POST['cid']}',da='{$_POST['d']}'";
		 $q.=",mo='{$_POST['m']}',tf='{$_POST['TF']}',tt='{$_POST['TTo']}' where coid='{$_POST['cid']}'";
		 $r=mysqli_query($conn,$q)or die("Error in the Query$q<br>".mysqli_error($conn));
		 echo"data saved succefully";
		 //header("location:index.php");
}else{
	DisplayError();
}
	






















include("footer.php");
?>