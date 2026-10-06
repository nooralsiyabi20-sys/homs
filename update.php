<?php
include('header.php');
include('arrays.php');
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
$pageTitle="****update-OfficeHuores****";
echo "\n<form action=saveupdate.php method=post
style='width:40%;background-color:#FFFAF0;'>\n";

$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>Update-OfficeHuores</h2>\n";
//echo "*Course ID: <input type=text name=ci style='width:190px;'><hr>\n";
//echo "*Course Name: <input type=text name=cn style='width:190px;'><hr>\n";
echo "*Office ID: <input type=text name=oi style='width:190px;'><hr>\n";

echo"*select mode:";
foreach($modes as $k=>$v) {
echo "<input type=radio name=mo value=$k>$v\n";  
}



echo"<hr>*Select Day:";
echo "<br>Day: <select name='od' style=background-color:#f9ecf2>";
echo "<option value='x'> - Choose - </option>";
for ($i=1;$i<=31;$i++){
 if($i == $Od) $def=' selected'; else $def='';
 echo"<option value='$i'$def>$i</option>";}
echo "</select>";



echo" *Select Time:";
echo "from: <select name='timefrome' style=background-color:#f9ecf2>";
echo "<option value='x'>** Choose **</option>";
foreach ($Time_f as $R=>$v){
  
 if($R == $OT) $def=' selected'; else $def='';
 echo "<option value='$R'$def>$v ($R)</option>";
}
echo"</select>";

echo "To: <select name='timeto' style=background-color:#f9ecf2>";
echo "<option value='x'>** Choose **</option>";
foreach ($Time_t as $R=>$v){
  
 if($R == $OT) $def=' selected'; else $def='';
 echo "<option value='$R'$def>$v ($R)</option>";
}
echo"</select>";






echo "</body></html>\n";
echo "<hr><input style='margin-left:200px;background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name=send value='Show Result'>&nbsp;&nbsp;";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Clear Data'> ";
include('footer.php');
?>