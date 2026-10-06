<?php
include('header.php');
//include('arrays.php');
include("dbconnect.php");
?> 
<!DOCTYPE html>
<html>
  <head>
    <style>
 
  </head>
 <body>
    <div class="img-container" >
      <img src="up.jpg" width="250" height="250">
    </div>
  </body>
</html>

<?php
$pageTitle="****Search-staff detilase****";
echo "\n<form action=reseltsearch.php method=post
style='width:40%;background-color:#FFFAF0;'>\n";

$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>Update-OfficeHuores</h2>\n";














echo "<hr><input style='margin-left:200px;background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name=search='Show Result'>&nbsp;&nbsp;";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='delete'> ";
include('footer.php');
?>