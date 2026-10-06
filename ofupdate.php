<?php
include("header.php");
//include("arrays.php");
include("dbconnect.php");
include('menu.php');
$days = [1=>'Sunday',2=>'Monday',3=> 'Tuesday',4=> 'Wednesday',5=>'Thursday'];
$times=['08'=>'8am','09'=>'9am','10'=>'10am','11'=>'11am','12'=>'12pm',
       '13'=>'1pm','14'=>'2pm','15'=>'3pm'];
$Time_f=[1=>'10:00','13:00'];
$Time_t=[1=>'11:00','14:00'];


$s=" style = dispaly:inline;";
echo "\n<form action=saveupdate.php method=post 
style='width:40%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Update Office Houre</h2>\n";
//echo"ID:$mo {$_GET['']} $mc<hr>\n";
$n_r="select * from OfficeHour where OHID='{$_GET['id']}'";
//echo $n_r;
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
$m_r=mysqli_fetch_assoc($r);
//print_r($m_r);
echo "Room Number:<input type=text name=rn value='{$m_r['RoomNo']}'><hr>\n";
//echo "course ID:<input type=text name=cid value='{$m_r['courseID']}'><hr>\n";
$nf_qv="select  * from course order by courseName ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv);
echo "Course ID: <select name='cid' style='background-color:#ebebe0; color:black;'>";
//echo "<option value='x'>choose from  course ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
if($supp['courseID'] == $m_r['courseID']) $def=' selected';else $def='';	
echo "<option value='{$supp['courseID']}'$def>{$supp['courseID']}-{$supp['courseName']}</option>";
}
echo "</select><hr>";

//echo "PID:<input type=text name=pid value='{$m_r['pid']}'><hr>\n";
echo "Staff ID:{$m_r['StaffID']}<input type=hidden name=sid value='{$m_r['StaffID']}'>
<input type=hidden name=OHID value='{$m_r['OHID']}'><hr>\n";
$modes=['On'=>'Online','Of'=>'Office'];
echo"Mode:";
foreach($modes as $k=> $v) { 
echo "<input type=radio name=m value='$v'"; 
if($v == $m_r['mode']) echo " checked"; 
echo ">$v\n"; 
}

echo"</select>";



echo "</select><hr>Time From: <select name=tf>"; 
/*
$nf="select TimeFrom from OfficeHour order by TimeFrom"; 
$rj=mysqli_query($conn,$nf) or die("Error in Query $nf". 
mysqli_error($conn)); 
while(list($fn)=mysqli_fetch_row($rj)) { 
*/
foreach($times as $k=>$v){
echo "<option value=$k"; 
if($k == $m_r['TimeFrom']) echo " selected"; 
echo ">$v</option>"; 
} 
echo "</select>\n";
echo "<hr>Time To: <select name=tt>"; 
/*$nf="select TimeTo from OfficeHour order by TimeTo"; 
$rj=mysqli_query($conn,$nf) or die("Error in Query $nf". 
mysqli_error($conn)); 
while(list($fn)=mysqli_fetch_row($rj)) { 
*/
foreach($times as $k=>$v){
echo "<option value=$k"; 
if($k == $m_r['TimeTo']) echo " selected"; 
echo ">$v</option>"; 
} 
echo "</select><hr>\n";

//echo "Day:<select name='d' style='background-color:#ebebe0; color:black;'>";
	
//	foreach($days  as $k=> $v) { 
//echo "<option value=$k>$v";
//}

 /* echo "Day:<select name='d' style='background-color:#ebebe0; color:black;'>";
$nf_qv="select day from OfficeHour order by day ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv); */
echo "</select>Day: <select name=d>"; 
/*$nf="select day from OfficeHour "; 
$rj=mysqli_query($conn,$nf) or die("Error in Query $nf". 
mysqli_error($conn)); 
while(list($fn)=mysqli_fetch_row($rj)) { 
*/
foreach($days as $k=>$v){
echo "<option value=$k"; 
if($k == $m_r['day']) echo " selected"; 
echo ">$v</option>"; 
} 
/* foreach($days  as $k=> $v) { 
echo "<option value=$k>$v";
} */

echo "</select>\n";






	






echo "</body></html>\n";

echo "<hr><input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name='send' value='Save data'> ";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Clear Data'> ";
include("footer.php");
?>