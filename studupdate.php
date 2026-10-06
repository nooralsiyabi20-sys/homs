<?php
include("header.php");
include("arrays.php");
include("dbconnect.php");
include("menu.php");
?> 
<!DOCTYPE html>
<html>
 
 <body>
     <<style>
li { display:inline; list-style-type:none; padding-right:20px;
</style>
    <div class="img-container" >
      <img src="stafupdate.png" width="540" height="150">
    </div>
  </body>
</html>

<?php
$s=" style = dispaly:inline;";
echo "\n<form action=savestudentup.php method=post 
style='width:80%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Update Student Data</h2>\n";
//echo"ID:$mo {$_POST['oid']} $mc<hr>\n";
$n_r="select * from students where StudentID='{$_GET['id']}'";
$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
$m_r=mysqli_fetch_assoc ($r);

echo "Student ID:<input type=hidden name=stuid vlaue='{$m_r['StudentID']}'><hr>\n";
echo "Student Name:<input type=text name=stuna vlaue='{$m_r['StudentName']}'><hr>\n";
echo "Staff Email:<input type=text name=stue vlaue='{$m_r['StudentEmail']}'><hr>\n";
echo "Student Phone:<input type=text name=stuph vlaue='{$m_r['StudentPhone']}'><hr>\n";
echo "Residence ID:<input type=text name=reu vlaue='{$m_r['ResidenceID']}'><hr>\n";

echo "</body></html>\n";
echo "<hr><input style='margin-left:200px;background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='submit' name=send value='Save data'>&nbsp;&nbsp;";
echo "<input style='background-color:#f9ecf2;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Clear Data'> ";

include("footer.php");
?>