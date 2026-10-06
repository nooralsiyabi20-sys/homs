<?php
include('header.php');
include('arrays.php');
include("dbconnect.php");
include("menu.php");
?> 
<body>
<?php
$pageTitle="****Search-student detilase****";
echo "\n<form action=restud.php method=post
style='width:45%;background-color:#FFFAF0;'>\n";

$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>Search-Student details</h2>\n<br>";

echo"Student ID:<input type=text name=sti>\n **You should type full ID **<br><br>";
echo"Student Name:<input type=text name=stn>\n";

echo "<hr><input style='margin-left:200px;background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name=search value='Show Result'>&nbsp;&nbsp;";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='delete'>";
?>

<?php
include('footer.php');
?>