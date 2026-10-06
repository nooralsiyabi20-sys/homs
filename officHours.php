<?php
include("header.php");
include("dbconnect.php");
include('menu.php');


$n_r="select *from OfficeHour where StaffID='{$_GET['id']}' ";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
//$m_r=mysqli_fetch_assoc($r);
$m=mysqli_num_rows($r);


if($m==0) {
	echo"<h1> There are no data matching your searching </h1>";
} else{	
 
echo"<table border=1 ><tr style='background-color:#ccccb3;' style='text-align:center;'>
 <th>RoomNo</th><th>day</th><th>Time From</th><th>Time To</th>
<th>mode</th><th>StaffID</th><th>courseID</th> <th>Action	</th>" ;

while($st=mysqli_fetch_assoc($r)) {



echo"<tr>
<td>{$st['RoomNo']}</td>
<td>{$st['day']}</td>
<td>{$st['TimeFrom']}</td><td>{$st['TimeTo']}</td>
<td>{$st['mode']}</td><td>{$st['StaffID']}</td>
<td>{$st['courseID']}</td>

<td>
<a href='ofupdate.php?id={$st['OHID']}'> Update Office Hour</a></td></tr>";
}
}
echo"</table><br><br><br><br><br><br><br>";
include("footer.php");
?>