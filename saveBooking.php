
<?php
include("header.php");
include("dbconnect.php");
include("menu.php");
include("mylib.php");


$errors=[];
// validation
$qb="select * FROM `booking` WHERE `bStudentId`='{$_POST['studid']}' and 
     `bStaffId`='{$_POST['stfid']}' and `bCourseId`='{$_POST['cid']}' and 
	 `bDay`='{$_POST['day']}' and `bFrom`='{$_POST['ft']}' and `bTo`='{$_POST['tt']}'";
	 //echo $qb;
	 
$rb=mysqli_query($conn,$qb) or die("Erorr in the query :<br> $qb <br>" .mysqli_error($conn));
$q11=mysqli_num_rows($rb);
//echo $q11;
if($q11!=0){
	$errors[]="This booking already exists";
}

//echo "<hr>".mysqli_num_rows($rb);
	$ft=$_POST['ft'];
    $tt=$_POST['tt'];
   $n_r="select * from booking where bStudentId ='{$_POST['studid']}' and bDay ='{$_POST['day']}'and  bFrom = convert('$ft',Time) or bTo = convert('$tt',Time)";
	//echo $n_r;
	$r=mysqli_query($conn,$n_r) or die("Erorr in query:<br>$mo $n_r $mc <br>" .mysqli_error($conn) );
    $m_r=mysqli_fetch_assoc($r);
    $m=mysqli_num_rows($r);
   
	if($m!=0)
	$errors[]="This booking already exists";

if(count($errors)==0){
//////////////
if(isset($_POST['send'])) {
	$ft=$_POST['ft'].":00:00";
    $tt=$_POST['tt'].":00:00";
	if($_POST['send']=='Save Appointment'){
$q="insert into booking values (NUll, '{$_POST['studid']}', '{$_POST['stfid']}',";
$q.="'{$_POST['cid']}', '{$_POST['day']}','$ft','$tt')";
//echo $q ;
$r = mysqli_query($conn,$q) or die ("Error in query: $q".mysqli_error($conn));
header("location:index.php") ;
	} else {
		header("location:index.php") ;
	}
}
}else{
	//include("mylib.php");
	//header("location:index.php") ;
	DisplayErrors();
}
include("footer.php");
?>