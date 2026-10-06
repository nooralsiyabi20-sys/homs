<?php
include('header.php');
include('arrays.php');
include("dbconnect.php");
include("menu.php");
$days = [1=>'Sunday','Monday', 'Tuesday', 'Wednesday','Thursday'];
$q="select *from booking, staff, course where bstaffid=staffID and bcourseId=courseID and bstudentId='{$_SESSION['SUID']}'";

//echo $q;
$r=mysqli_query($conn, $q) or die("Error in the query:<br><mark>$q</mark>".mysqli_error($conn)) ;
$n=mysqli_num_rows($r);

if($n==0){
	echo"<h2>You have no booking</h2>";
	}
  else{
echo"<table border=1 ><tr style='background-color:#ccccb3;'><th>N</th><th>Course ID</th><th>Staff Name</th><th>Room No</th><th>Day</th><th>Time From</th><th>Time To</th><th>Appointment</th></tr>\n";  
}
//$bok1=mysqli_fetch_assoc($r);
//print_r($bok1);
	$c=1 ;
	
	while($bok=mysqli_fetch_assoc($r)){
		
	echo"<tr><td>$c</td><td>{$bok['bCourseId']}</td><td>{$bok['StaffName']}</td>
	<td>{$bok['RoomNu']}</td><td>{$days[$bok['bDay']]}</td><td>{$bok['bFrom']}</td>
	<td>{$bok['bTo']}</td><td><a href='msg.php?bid={$bok['bId']}'>cancel</a></td></tr>";
	 $c++;
}
echo "</table>\n <br><br><br><br><br>"; 










include("footer.php");

?>  