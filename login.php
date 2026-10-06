<?php
 include "dbconnect.php";
$usrid = mysqli_real_escape_string($conn,$_POST['uid']);
$usrpswd = mysqli_real_escape_string($conn,$_POST['ps']);
 $q = "select * from users where uId = '$usrid' and uPswd = password('$usrpswd') ";
 $r = mysqli_query($conn,$q) or die ("Error in query: $q".
      mysqli_error($conn));
	  //echo "Rows: $q <br>" .mysqli_num_rows($r);
 if(mysqli_num_rows($r) == 1) { 

	 if(!isset($_SESSION['SUID'])){ 
	$user=mysqli_fetch_assoc($r);
	session_start(); 
	$_SESSION['SUID'] = $user['uId']; 
	$_SESSION['SUNAME'] = $user['uName']; 
	$_SESSION['SUTYPE'] = $user['uType'];
	header("Location:home.php");

	 } else { header("location: error.php?ec=0");}
}
else
{
	//echo "Login Fail";
//echo "<a href=loginForm.php> Login again</a>";

	header("Location:loginForm.php?error=1");
	
}



include('footer.php');
echo "</body></html>\n";
?>