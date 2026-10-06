<?php
include("header.php");
include("arrays.php");
include("dbconnect.php");
include("menu.php");
?> 
<!DOCTYPE html>
<html>
<style>
li { display:inline; list-style-type:none; padding-right:20px;
</style>
    <div class="img-container" >
      <img src="stafupdate.png" width="540" height="150">
    </div>
  </body>
</html>

<?php
$s=" style = dispaly:inline;";
echo "\n<form action=savestaffup.php method=post 
style='width:80%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Update Staff Detailes</h2>\n";
$n_r="select * from staff  where staffID ='{$_GET['id']}'";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn));
$m_r=mysqli_fetch_assoc($r);

/*echo"<pre>";
print_r($m_r);
echo"</pre>";*/

echo "Staff ID:{$m_r['StaffID']}<input type=hidden name=stid value='{$m_r['StaffID']}'><hr>\n";
echo "Residence ID:{$m_r['ResidenceID']}<input type=hidden name=re value='{$m_r['ResidenceID']}'><hr>\n";
echo "Staff Name:{$m_r['StaffName']}<input type=hidden name=stna value='{$m_r['StaffName']}'><hr>\n";
echo "Staff Email:<input type=text name=ste value='{$m_r['StaffEmail']}'><hr>\n";
echo "Staff Phone:<input type=text name=stph value='{$m_r['StaffPhone']}'><hr>\n";
//echo "Residence ID:<input type=text name=re value='{$m_r['ResidenceID']}'><hr>\n";
echo "Room Number:<input type=text name=rn value='{$m_r['RoomNu']}'><hr>\n";
echo "</body></html>\n";
echo "<hr><input style='margin-left:200px;background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name=send value='Save data'>&nbsp;&nbsp;";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Clear Data'> ";

include("footer.php");
?>