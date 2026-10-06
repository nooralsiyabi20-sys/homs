
<?php
//$pid = $_GET['bid']; 
include('header.php');
include("dbconnect.php");
$bid = $_GET['bid'];

echo "<form action='deletbooking.php' method='post'
style='width:40%;background-color:#FFFAF0;'>\n";
echo "<h2>Are you sure you want to Cancel Appointmen<br></h2>";
echo "<input type='hidden' name='bid' value='$bid'>";

echo "<input type='submit' name='answer' value='Yes'>&nbsp;&nbsp;";
echo "<input type='submit' name='answer' value='No'></center></form>";
include('footer.php');

?>