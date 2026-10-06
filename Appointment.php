<?php
include('header.php');
include("menu.php");
//include('arrays.php');
include("dbconnect.php");
include('mylib.php');
$days = [1=>'Sunday','Monday', 'Tuesday', 'Wednesday','Thursday'];

?> 
<!DOCTYPE html>
<html>
 <body>
    <div class="img-container" >
      <img src="App.png" width="200" height="200">
    </div>
  </body>
</html>

<?php

echo "\n<form action=saveBooking.php method=post
style='width:40%;background-color:#FFFAF0;'>\n";
//$s=" style = dispaly:inline;";

	
echo "<h2 style='text-align:center;margin:2px auto;'>Booking an Appointment</h2>\n";
echo"Course Name:$mo{$_GET['cn']}$mc<br>";
echo"Course Id:$mo{$_GET['cid']}$mc<br>";
echo"Staff Name:$mo{$_GET['stf']}$mc<br>";
echo"Staff Id:$mo{$_GET['stfid']}$mc<br>";
echo"Room Number:$mo{$_GET['rno']}$mc<br>";
echo"Day No:$mo{$_GET['dayNo']}$mc<br>";
echo"Day Name:$mo{$_GET['dayName']}$mc<br>";
echo"Time From:$mo{$_GET['ft']}$mc<br>";
echo"Time To:$mo{$_GET['tt']}$mc<br>";
echo "<input type=hidden name=cid value='{$_GET['cid']}'>\n";
echo "<input type=hidden name=stfid value='{$_GET['stfid']}'>\n";
echo "<input type=hidden name=studid value='{$_SESSION['SUID']}'>\n";
echo "<input type=hidden name=day value='{$_GET['dayNo']}'>\n";
echo "<input type=hidden name=ft value='{$_GET['ft']}'>\n";
echo "<input type=hidden name=tt value='{$_GET['tt']}'>\n";
echo "<input type=hidden name=stf value='{$_GET['stf']}'>\n";
echo "<hr><input style='margin-left:200px;background-color:#ebebe0;
border:2px solid black;border-radius:10px;' 
type='submit' name=send value='Save Appointment'>&nbsp;&nbsp;";
echo "<input style='background-color:#ebebe0;border:2px solid black;border-radius:10px;' 
type='submit' name='send' value='Cancel'> ";



?>

<?php
include('footer.php');
echo "</body></html>\n";
?>