<?php
include('header.php');
include('arrays.php');
include("dbconnect.php");
include("menu.php");
?> 

<?php
$pageTitle="****Search-staff detilase****";
echo "\n<form action=reseltsearch.php method=post
style='width:40%;background-color:#FFFAF0;'>\n";

$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>Search-staff</h2>\n";

echo"<label for='id1'>Staff ID</label><input class='form-control' type=text name=si placeholder='Enter the staff ID starting with e'>\n<br>";
echo"<label for='id1'>Staff Name</label><input class='form-control' type=text name=sn placeholder='Enter the staff name'>\n";

echo "<hr><input style='margin-left:200px;background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name=send value='Show result'>&nbsp;&nbsp;";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Delete'> <br><br><br>";
include('footer.php');
?>