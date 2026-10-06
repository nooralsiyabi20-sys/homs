<?php
$pageTitle="**** Add Office Houres ****";
include('arrays.php');include('mylib.php');include('dbconnect.php');include('header.php');
include('menu.php');
$days = [1=>'Sunday',2=>'Monday',3=> 'Tuesday',4=> 'Wednesday',5=>'Thursday'];
$times=['08'=>'8am','09'=>'9am','10'=>'10am','11'=>'11am','12'=>'12pm',
       '13'=>'1pm','14'=>'2pm','15'=>'3pm'];
//print_r($days);
$Time_f=[1=>'10:00','13:00'];
$Time_t=[1=>'11:00','14:00'];
echo "\n<form action=saveadd.php method=post 
style='width:40%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Add Office Houres</h2>\n";
$n_r="select * from staff  where staffID ='{$_GET['id']}'";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn));
$m_r=mysqli_fetch_assoc($r);
echo "Staff ID:{$m_r['StaffID']}<input type=hidden name=stid value='{$m_r['StaffID']}'><hr>\n";
echo "RoomNo: <input type=text name=rn style='width:190px;'><hr>\n";
//echo "day: <input type=text name=d style='width:190px;'><hr>\n";
echo "Day:<select name='d' style='background-color:#ebebe0; color:black;'>";
/*
$nf_qv="select day from OfficeHour order by day ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
//$nf_nv=mysqli_num_rows($nf_rv);

echo "<option value='x'>choose Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
	if($supp['day']==$m_r['day'])$def=' selected';else $def='';
	{echo "<option value='{$supp['day']}'$def>";}
	*/
	
	foreach($days  as $k=> $v) { 
echo "<option value=$k>$v";
}


//}
echo "</select><hr>";
//echo "TimeFrom: <input type=text name=tf style='width:190px;'><hr>\n";
//echo "TimeTo: <input type=text name=tt style='width:190px;'><hr>\n";
echo "Time From: <select name=tf>"; 

foreach($times as $k=>$v){
echo "<option value=$k"; 
//if($k == $m_r['TimeFrom']) echo " selected"; 
echo ">$v</option>"; 
} 
echo "</select>\n";
echo "<hr>Time To: <select name=tt>"; 

foreach($times as $k=>$v){
echo "<option value=$k"; 
//if($k == $m_r['TimeTo']) echo " selected"; 
echo ">$v</option>"; 
} 
echo "</select><hr>\n";


echo "Mood:&nbsp;&nbsp;&nbsp;";
$MOOD = ['Offline','Online'];
foreach($MOOD as $k=>$v) {
echo "<input type=radio name=m value=$v>$v&nbsp;&nbsp;&nbsp;\n";  
}

$qc="select  * from course order by courseName ";
$rc=mysqli_query($conn,$qc) or die("Error in the Query  : $qc<br>". mysqli_error($conn));
$nc=mysqli_num_rows($rc);
echo "<hr>Course ID: <select name='cn' style='background-color:#ebebe0; color:black;'>";
echo "<option value='x'>choose from  course ID &nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($rc)){
	
echo "<option value='{$supp['courseID']}'>{$supp['courseID']}-{$supp['courseName']}</option>";
}
echo "</select>";

echo"<hr>\n";






echo "<p style='margin:5px auto;text-align:center;'><input type=submit name=add value='Save Data'>\n
<input type=reset name=clear value='Reset Data'>\n
</p></form>\n";
include('footer.php');
echo "</body></html>\n";

?>