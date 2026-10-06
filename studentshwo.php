<?php
include("header.php");
//include("arrays.php");
include("dbconnect.php");
?> 
<!DOCTYPE html>
<html>
<style>
li { display:inline; list-style-type:none; padding-right:20px;}

</style>
</html>
        <?php
  include('menu.php');

?>
    


<?php
$s=" style = dispaly:inline;";
echo "\n<form action=savestudentup.php method=post 
style='width:80%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Show Student Data</h2><br>";

$n_r="select * from students  where StudentID ='{$_GET['sid']}'";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn));
$m_r=mysqli_fetch_assoc($r);

/*echo"<pre>";
print_r($m_r);
echo"</pre>";*/

echo "Student ID:{$m_r['StudentID']}<hr>\n";
echo "Student Name:{$m_r['StudentName']}<hr>\n";
echo "Student Email:{$m_r['StudentEmail']}<hr>\n";
echo "Student Phone:{$m_r['StudentPhone']}<hr>\n";
echo "Residence ID:{$m_r['ResidenceID']}<hr>\n";
echo "</body></html>\n";


include("footer.php");
?>