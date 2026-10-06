<!DOCTYPE html><html><head>
<title>Deleting Appointment</title>
<style></style></head>
<?php
include("dbconnect.php");
$staId = $_POST['stfid'];
$stf = $_POST ['stf'];

echo "<form action='savBookingod='post'>";
echo "<h2>Are you sure you want to delete the Appointment:<br>
$stf, ID: $empid</h2>";
/* echo "<input type='hidden' name='empid' value='$empid'>";
echo "<input type='hidden' name='fullname' value='$fullname'>";
echo "<input type='submit' name='answer' value='Yes'>&nbsp;&nbsp;";
echo "<input type='submit' name='answer' value='No'></center>"; */
echo "</form>";
?>