<?php
include("header.php");
include("arrays.php");
include("dbconnect.php");
$days = [1=>'Sunday','Monday', 'Tuesday', 'Wednesday','Thursday'];
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
echo "\n<form action=saveappup.php method=post 
style='width:80%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Update office hour</h2>\n";
//echo"ID:$mo {$_GET['']} $mc<hr>\n";
$n_r="select * from OfficeHour, course where course.courseID = courseName  ";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
$m_r=mysqli_fetch_assoc($r);


echo "course ID:<input type='hidden' name=cid vlaue='{$m_r['courseID']}'><hr>\n";
echo "course Name:<input type=text name=cn vlaue='{$m_r['coursName']}'><hr>\n";
echo "Staff Name:<input type=text name=ro vlaue='{$m_r['RoomNo']}'><hr>\n";

$modes=['On'=>'Online','Off'=>'Offline'];
echo"Mode:";
foreach($modes as $k=> $v) { 
echo "<input type=radio name=m value='$k'"; 
if($k == $m_r['mode']) echo " checked"; 
echo ">$v\n"; 
}

echo"</select>";

/* $da="select day from OfficeHour  order by day";
$d=mysqli_query($conn,$da) or die("Erorr in the query :<br>$mo $da $mc <br>" .mysqli_error($conn));
$dy=mysqli_num_rows($d);
echo"<hr> Choose day: <select name=d><br>\n";
echo"<option value='z'>choose--z</option>";
while ($Da=mysqli_fetch_assoc($d)){
echo"option value= '{$Da['day']}' ";
    if ($Da['day']) echo"selected";
	echo"{$Da['day']}</option>\n";
}
echo"</select>"; */
$q="select TimeFrom from  OfficeHour  order by TimeFrom";
$t=mysqli_query($conn,$q) or die("Erorr in the query :<br>$mo $q $mc <br>" .mysqli_error($conn));
$f=mysqli_num_rows($t);
echo"<hr> Choose TimeFrom: <select name=TF><br>\n";
echo"<option value='y'>choose--y</option>";
while ($Time_f=mysqli_fetch_assoc($t)){
echo"option value= '{$Time_f['TimeFrom']}' ";
    if ($Time_f['TimeFrom']==$Time_f['TimeFrom']) echo"selected";
	echo"{$Time_f['TimeFrom']}</option>";
}
echo"</select>";
$q="select TimeTo from OfficeHour  order by TimeTo";
$ti=mysqli_query($conn,$q) or die("Erorr in the query :<br>$mo $q $mc <br>" .mysqli_error($conn));
$to=mysqli_num_rows($ti);
echo"<hr> Choose TimeTo: <select name=TTo><br>\n";
echo"<option value='z'>choose--z</option>";
while ($Time_t=mysqli_fetch_assoc($ti)){
echo"option value= '{$Time_t['TimeTo']}' ";
    if ($Time_t['TimeTo']) echo"selected";
	echo"{$Time_t['TimeTo']}</option>\n";
	
}
echo"</select>";

echo "<hr>Day: ";
echo "<select name='d' style='background-color:#ebebe0; color:black;'>";
echo "<option value='x'>Choose the Day</option>";
foreach($days as $k=>$v)
{
	echo "<option value=$k>$v</option>";
	
}
echo "</select>";

 

	







///echo"</select><hr> Day: <select name=da>";
///$da="select day from OfficeHour order by day";
///$dy=mysqli_query($conn,$da) or die ("Error in query $da".mysqli_error($conn));
///while(list($
















echo "</body></html>\n";

echo "<hr><input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='send details'> ";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Clear Data'> ";
include("footer.php");
?>