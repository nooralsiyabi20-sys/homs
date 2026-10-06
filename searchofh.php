<?php
include("header.php");
include("dbconnect.php");
include("menu.php");
$days = [1=>'Sunday','Monday', 'Tuesday', 'Wednesday','Thursday'];
?>
<!DOCTYPE html>
<html>
 <body>
    <div class="img-container" >
      <img src="se.jpg" width="200" height="200">
    </div>
  </body>
</html>
<?php
$pageTitle="****Search-OfficeHuores****";
echo "\n<form action=tableofh.php method=post
style='width:40%;background-color:#efebe9;'>\n";

$s=" style = dispaly:inline;";
echo "<h2 style='text-align:center;margin:2px auto;'>Search-OfficeHuores</h2>\n";




$nf_qv="select  * from course order by courseName ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv);
echo "Course ID: <select name='cn' style='background-color:#ebebe0; color:black;'>";
echo "<option value='x'>choose from  course ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
	
echo "<option value='{$supp['courseID']}'>{$supp['courseID']}-{$supp['courseName']}</option>";
}
echo "</select>";

echo"<hr>\n";


echo "Staff Name: <select name='si' style='background-color:#ebebe0; color:black;'>";
$nf_qv="select StaffID, StaffName from staff order by StaffName ";
$nf_rv=mysqli_query($conn,$nf_qv) or die("Error in the Query  : $nf_qv<br>". mysqli_error($conn));
$nf_nv=mysqli_num_rows($nf_rv);

echo "<option value='x'>choose from  Staff Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>";
while($supp=mysqli_fetch_assoc($nf_rv)){
	
echo "<option value='{$supp['StaffID']}'>{$supp['StaffName']}</option>/n";
}
echo "</select>";
echo"<hr>\n";

echo "Day: ";
echo "<select name='d' style='background-color:#ebebe0; color:black;'>";
echo "<option value='x'>Choose the Day</option>";
foreach($days as $k=>$v)
{
	echo "<option value=$k>$v</option>";
	
}
echo "</select>";


//echo "Course Name: <input type=text name=cn style='width:190px;'><hr>\n";
echo "<hr><input style='margin-left:200px;background-color:#ebebe0;border:2px solid black;border-radius:10px;' type='submit' name=send value='Search'>&nbsp;&nbsp;";
echo "<input style='background-color:#ebebe0;border:2px solid black;border-radius:10px;' type='reset' name='send' value='Clear Data'> ";



include("footer.php");
?>