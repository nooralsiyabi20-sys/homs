<?php
include("header.php");
include("arrays.php");
include("dbconnect.php");
$days = [1=>'Sunday','Monday', 'Tuesday', 'Wednesday','Thursday'];
$Time_f=[1=>'10:00','13:00'];
$Time_t=[1=>'11:00','14:00'];
  include('menu.php');

?>





<!DOCTYPE html>
<html>
    <div class="img-container" >
      <img src="officeupdate.png" width="540" height="150">
    </div>
 
</html>


<?php
$s=" style = dispaly:inline;";
echo "\n<form action=saveappup.php method=post 
style='width:80%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Update Appoiment</h2>\n";
//echo"ID:$mo {$_GET['']} $mc<hr>\n";
$n_r="select *from booking, staff, course where bstaffid=staffID and bcourseId=courseID and bstudentId='{$_SESSION['SUID']}' and bId='{$_GET['bid']}'";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
$bok=mysqli_fetch_assoc($r);

$nf_qv="select  * from course order by courseName ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv);
echo "Course ID: <select name='cn' style='background-color:#ebebe0; color:black;'>";
echo "<option value='x'>choose from  course ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
	if($supp['courseID']==$bok['bCourseId'])$def=' selected';else $def='';
echo "<option value='{$supp['courseID']}'$def>{$supp['courseID']}-{$supp['courseName']}</option>";
}
echo "</select>";

echo"<hr>\n";

echo "Staff Name:<select name='si' style='background-color:#ebebe0; color:black;'>";
$nf_qv="select StaffID, StaffName from staff order by StaffName ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv);

echo "<option value='x'>choose from  Staff Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
	if($supp['StaffName']==$bok['StaffName'])$def=' selected';else $def='';
	
echo "<option value='{$supp['StaffName']}'$def>{$supp['StaffName']}</option>/n";
}
echo "</select>";
echo"<hr>\n";

echo "Room Number:<select name='rn' style='background-color:#ebebe0; color:black;'>";
$nf_qv="select RoomNo from OfficeHour order by RoomNo ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv);

echo "<option value='x'>choose from  Room Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
	if($supp['RoomNo']==$bok['RoomNu'])$def='selected';else $def='';
	
echo "<option value='{$supp['RoomNo']}'$def>{$supp['RoomNo']}</option>/n";
}
echo "</select>";
echo"<hr>\n";


echo "Day:<select name='d' style='background-color:#ebebe0; color:black;'>";
$nf_qv="select day from OfficeHour order by day ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv);

echo "<option value='x'>choose Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
	if($supp['day']==$bok['bDay'])$def=' selected';else $def='';
	
echo "<option value='{$supp['day']}'$def>{$supp['day']}</option>/n";
}
echo "</select>";
echo"<hr>\n";








//echo "Room No:<input type=text name=rn vlaue='{$bok['RoomNu']}'><hr>\n";



/* $modes=['On'=>'Online','Off'=>'Offline'];
echo"Mode:";
foreach($modes as $k=> $v) { 
echo "<input type=radio name=m value='$k'"; 
if($k == $m_r['mode']) echo " checked"; 
echo ">$v\n"; 
} */

//echo"</select>";

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
/* $q="select TimeFrom from  OfficeHour  order by TimeFrom";
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
echo"</select>"; */


echo "</select><hr>Time From: <select name=tf>"; 
$nf="select TimeFrom from OfficeHour order by TimeFrom"; 
$rj=mysqli_query($conn,$nf) or die("Error in Query $nf". 
mysqli_error($conn)); 
while(list($fn)=mysqli_fetch_row($rj)) { 
echo "<option value=$fn"; 
if($fn == $bok['bFrom']) echo " selected"; 
echo ">$fn</option>"; 
} 
echo "</select><hr>\n";
echo "</select><hr>Time To: <select name=tt>"; 
$nf="select TimeTo from OfficeHour order by TimeTo"; 
$rj=mysqli_query($conn,$nf) or die("Error in Query $nf". 
mysqli_error($conn)); 
while(list($fn)=mysqli_fetch_row($rj)) { 
echo "<option value=$fn"; 
if($fn == $bok['bTo']) echo " selected"; 
echo ">$fn</option>"; 
} 
echo "</select><hr>\n";
 

	





//echo"<hr>comment:<input type=text name=c style='width:200px;'><hr>\n";

///echo"</select><hr> Day: <select name=da>";
///$da="select day from OfficeHour order by day";
///$dy=mysqli_query($conn,$da) or die ("Error in query $da".mysqli_error($conn));
///while(list($
















echo "</body></html>\n";
echo "<hr><input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name='send' value='send details'> ";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Clear Data'> ";
echo "</form>";
include("footer.php");
?>