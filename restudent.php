<?php
include('header.php');
include('arrays.php');
include("dbconnect.php");
?> 



<?php
$pageTitle="****Reslet of search student detailes..****";
$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>Reselte of search</h2>\n";
if(empty($_POST['sti']) && empty($_POST['stn'])){
	echo"<h1>Please enter at least one value to search for</h1>";
} else{
if(!empty($_POST['sti'])) echo"Student ID: $mo{$_POST['sti']} $mc<br>";
if(!empty($_POST['stn'])) echo"Student Name: $mo{$_POST['stn']}$mc<br>";
$q="select  StudentID,StudentName from students where StudentID >0";
if(!empty($_POST['sti']) && !empty($_POST['stn']))
{$q.=" or StudentID ='{$_POST['sti']}' and StudentName like'{$_POST['stn']}%'";}	
else{
if(!empty($_POST['sti'])) {$q.=" or StudentID ='{$_POST['sti']}'";}
if(!empty($_POST['stn'])) {$q.=" or StudentName like'{$_POST['stn']}%'";}
}
$q .= " order by StudentID,StudentName";
$t=mysqli_query($conn,$q) or die ("Error in the query:<br>$mo $q $mc <br>".mysqli_error($conn));
$m=mysqli_num_rows($t);
$st=mysqli_fetch_assoc($t);

if($m==0) {
	echo"<h1> There are no data matching your searching </h1>";
} else{	
 

echo"<table>";



echo"<tr><td>{$st['StudentID']}</td><td>{$st['StudentName']}</td>
<td><a href='studupdate.php?ids={$st['StudentID']}'>update</a></td>

</tr>";
}
echo"</table>\n";
}


echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Update data'> ";




















include('footer.php');
?>