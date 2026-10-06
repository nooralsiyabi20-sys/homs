<?php
include("header.php");
include("arrays.php");
include("dbconnect.php");
include("menu.php");
include("mylib.php");
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
//echo "<h2 style='text-align:center;margin:2px auto;'>New detailes of student</h2>\n";
//echo"<pre>";print_r($_POST);echo"</pre>";
$errors=[];
/* if(!preg_match("/^s[1-9]{2}[j|s]([0-9]){3,5}$/",($_POST['stid']))) { 
 $errors[]="Correct Staff ID ....... "; 
} */


if(!preg_match("/^[A-Za-z\s\-]{3,20}$/",$_POST['stuna'])){
	    $errors[]="Please correct the name $mo {$_POST['stuna']} $mc ";
}
if(!filter_var($_POST['stue'], FILTER_VALIDATE_EMAIL)) { 
 $errors[]="Please correct the e-mail.."; 
}

if(!preg_match("/^[0-9]{8}$/",$_POST['stuph'])){
	   $errors[]="Please correct the phone number $mo {$_POST['stuph']} $mc ";
}
if(!preg_match("/^[0-9]{4,7}$/",$_POST['reu'])){
	    $errors[]="Please correct the residence ID $mo {$_POST['reu']} $mc ";
}

if(count($errors)==0){
	     $clean_sn=ucfirst(strtolower(trim($_POST['stuna'])));
		 $clean_sp=$_POST['stuph'];
		 $clean_re=$_POST['reu'];
		 //$clean_sti=$_POST['stuid'];
		 $q="update students set StudentName='$clean_sn',StudentPhone='$clean_sp',StudentEmail='{$_POST['stue']}'";
		 $q.=",ResidenceID='$clean_re' where StudentID='{$_POST['stuid']}'";
		 $r=mysqli_query($conn,$q)or die("Error in the Query$q<br>".mysqli_error($conn));
		 echo"data saved succefully";
		 header("location:studentse.php");
}else{
	DisplayErrors();
}
	
include("footer.php");
?>