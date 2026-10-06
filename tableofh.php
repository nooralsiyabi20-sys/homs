<?php
include("header.php");
include("menu.php");
include("dbconnect.php"); $errors=[]; include('mylib.php');
$days = [1=>'Sunday','Monday', 'Tuesday', 'Wednesday','Thursday'];

echo "<h1 style='text-align:center;margin:2px auto;'>The Result of Searching  - <a href='index.php'>logout</a></h1><br>";
if($_POST['cn']=='x' && $_POST['si']=='x' && $_POST['d']=='x'){
	echo "<h2>Please enter at least one value to search for</h2>";
} else {
echo "<h1 style='text-align:center;margin:2px auto;'>The Result of Searching  - <a href='searchofh.php'>Change your search values</a></h1><br>";
	echo "<i>You are searching for:</i><br>";
	echo "<b>";
	if($_POST['cn'] != 'x' ) {
		$nf_qc = "select courseID,courseName from course where courseID='{$_POST['cn']}'";
		$nf_rc=mysqli_query($conn, $nf_qc) or die("Error in the query:<br><mark>$nf_qc</mark>".mysqli_error($conn)) ;
		
		list($courseID,$cName)= mysqli_fetch_row($nf_rc);
		echo "course ID :$mo $courseID - $cName $mc \n";
	}	
	if($_POST['si'] != 'x' ) {
		$nf_s = "select StaffName from staff where StaffID='{$_POST['si']}'";
		$nf_sc=mysqli_query($conn, $nf_s) or die("Error in the query:<br><mark>$nf_s</mark>".mysqli_error($conn)) ;
		
		list($StaffName)= mysqli_fetch_row($nf_sc);
		echo "Staff Name:$mo $StaffName $mc \n";
	}	
	if($_POST['d'] != 'x' ) {
		
	    echo "Day:$mo {$days[$_POST['d']]} $mc \n";
     }	
$q="select o.OHID, o.RoomNo, o.day, o.TimeFrom, o.TimeTo, o.mode, s.StaffName,o.courseID, 
     c.courseName from OfficeHour o, staff s, course c 
	 where o.StaffID=s.StaffID and c.courseID=o.courseID ";

if($_POST['cn']!='x') $q.=" and c.courseID='{$_POST['cn']}'";

if($_POST['si']!='x')$q.=" and s.StaffID='{$_POST['si']}'";

if($_POST['d']!='x')$q.=" and o.day='{$_POST['d']}'";


$r=mysqli_query($conn, $q) or die("Error in the query:<br><mark>$q</mark>".mysqli_error($conn)) ;
$n=mysqli_num_rows($r);


if($n == 0){
	echo "<h3>There are no data matching your searching values</h3>";
} else{



echo "<table border=1 ><tr style='background-color:#ccccb3;'><th>Course Name</th><th>Course ID</th><th>Staff Name</th><th>Room No</th><th>Day</th><th>Time From</th><th>Time To</th><th>Mode</th><th>Appointment</th></tr>\n";

while($st=mysqli_fetch_assoc($r)) {
	$dt="?cid={$_POST['cn']}&stfid={$_POST['si']}&day={$_POST['d']}";
	//$st_link1="<a href='appupdate.php$dt'>Update-Appointment</a>";
	
	list($h,$m)=explode(":",$st['TimeTo']);
	$ts=mktime($h,$m,0,0,0,0);
	$tf=date("H:iA",$ts);
	
	list($t,$c)=explode(":",$st['TimeFrom']);
	$to=mktime($t,$c,0,0,0,0);
	$th=date("H:iA",$to);
	echo "<tr><td>{$st['courseName']}</td><td>{$st['courseID']}
</td><td align=center>{$st['StaffName']}</td><td>{$st['RoomNo']}</td>
<td>{$days[$st['day']]}</td><td>{$st['TimeFrom']}</td><td>$tf</td><td>{$st['mode']}</td><td><a href='appupdate.php?aid={$st['OHID']}'>update-apppoiment</a> </td></tr>";
}
echo "</table>\n"; 
}
}
include("footer.php");
?>