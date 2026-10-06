<?php
include('header.php');
include('arrays.php');
include("dbconnect.php");
include("menu.php");
?> 



<?php
$pageTitle="****Reslet of search****";
$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>Reselte of search</h2>\n";
if(empty($_POST['si']) && empty($_POST['sn'])){
	echo"<h1>Please enter at least one value to search for</h1>";
} else{
if(!empty($_POST['si'])) echo"Staff ID: $mo{$_POST['si']} $mc<br>";
if(!empty($_POST['sn'])) echo"Staff Name: $mo{$_POST['sn']}$mc<br>";
$q="select StaffID,StaffName from staff where StaffID > 0";
if(!empty($_POST['si']) && !empty($_POST['sn']))
{$q.=" or StaffID ='{$_POST['si']}' and StaffName like'{$_POST['sn']}%'";}	
else{
if(!empty($_POST['si'])) {$q.=" or StaffID ='{$_POST['si']}'";}
if(!empty($_POST['sn'])) {$q.=" or StaffName like'{$_POST['sn']}%'";}
}
$q .= " order by StaffID,StaffName";
$t=mysqli_query($conn,$q) or die ("Error in the query:<br>$mo $q $mc <br>".mysqli_error($conn));
$m=mysqli_num_rows($t);
$st=mysqli_fetch_assoc($t);

if($m==0) {
	echo"<h1> There are no data matching your searching </h1>";
} else{	
 




echo "<table border=1 ><tr style='background-color:#ccccb3;'><th>Staff ID</th><th>Staff Name</th><th>Update staff detailes</th>\n";
echo"<tr><td>{$st['StaffID']}</td><td>{$st['StaffName']}</td>
<td><a href='staffupdate.php?id={$st['StaffID']}'>update <br></a>  <a href='staffShwo.php?id={$st['StaffID']}'> Staffprofile</a></td>

</tr>";
}
echo"</table>\n";
}























include('footer.php');
?>