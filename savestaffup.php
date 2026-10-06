<?php
include("mylib.php");
include("header.php");
include("arrays.php");
include("dbconnect.php");
include("menu.php");
?> 
<!DOCTYPE html>
<html>
 
 <body>
    <div class="img-container" >
      <img src="officeupdate.png" width="540" height="150">
    </div>
  </body>
</html>

<?php
$s=" style = dispaly:inline;";
//echo"<pre>";print_r($_POST);echo"</pre>";
$errors=[];


if(!preg_match("/^[A-Za-z\s\-]{3,30}$/",$_POST['stna'])){
	    $errors[]="Please correct the name $mo {$_POST['stna']} $mc ";
}
if(!filter_var($_POST['ste'], FILTER_VALIDATE_EMAIL)) { 
 $errors[]="Please correct the e-mail.."; 
}

if(!preg_match("/^[0-9]{8}$/",$_POST['stph'])){
	$errors[]="Please correct the phone number $mo {$_POST['stph']} $mc ";
}
if(!preg_match("/^[0-9]{8}$/",$_POST['re'])){
	 $errors[]="Please correct the residence ID $mo {$_POST['re']} $mc ";
}
if(!preg_match("/^[0-9]{3}$/",$_POST['rn'])){
	    $errors[]="Please correct the number room $mo {$_POST['rn']} $mc ";		
}	
if(count($errors)==0){
	     $clean_sn=ucfirst(strtolower(trim($_POST['stna'])));
		 //$clean_se=ucfirst(strtolower(trim($_POST['ste'])));
		 $clean_sp=$_POST['stph'];
		 $clean_re=$_POST['re'];
		 $clean_se=$_POST['ste'];
		 $clean_rn=$_POST['rn'];
		 //$clean_sti=ucfirst(strtolower(trim($_POST['stid'])));
		 $q="update staff set StaffName='$clean_sn',StaffEmail='$clean_se'";
		 $q.=",StaffPhone='$clean_sp',ResidenceID='$clean_re'";
         $q.=",RoomNu='$clean_rn' where StaffID ='{$_POST['stid']}'";
		 $r=mysqli_query($conn,$q)or die("Error in the Query$q<br>".mysqli_error($conn));
		 echo"data saved succefully";
		 header("location:seastaff.php");
}else{
	DisplayErrors();
}
	






















include("footer.php");
?>