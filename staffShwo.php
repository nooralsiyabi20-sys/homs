<?php
include("header.php");
//include("arrays.php");
include("dbconnect.php");
?> 
<!DOCTYPE html>
<html>
<style>
li { display:inline; list-style-type:none; padding-right:20px;
</style>
</html>
        <?php
  include('menu.php');

?>
    


<?php
$s=" style = dispaly:inline;";
echo "\n<form action=savestaffup.php method=post 
style='width:80%;background-color:#FFFAF0;style='text-align:center;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Show Staff Data</h2><br>";

$n_r="select * from staff  where staffID ='{$_GET['id']}'";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn));
$m_r=mysqli_fetch_assoc($r);

/*echo"<pre>";
print_r($m_r);
echo"</pre>";*/

echo "<center><b>Staff ID:{$m_r['StaffID']}<hr>\n</center></b>";
echo "<center><b>Staff Name:{$m_r['StaffName']}<hr>\n</center></b>";
echo "<center><b>Staff Email:{$m_r['StaffEmail']}<hr>\n</center></b>";
echo "<center><b>Staff Phone:{$m_r['StaffPhone']}<hr>\n</center></b>";
echo "<center><b>Residence ID:{$m_r['ResidenceID']}<hr>\n</center></b>";
echo "<center><b>Room Number:{$m_r['RoomNu']}<hr>\n</center></b>";
echo "</body></html>\n";


include("footer.php");
?>