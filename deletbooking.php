<?php
//include('header.php');
//include('arrays.php');
include("dbconnect.php");
//print_r($_GET);
if($_POST['answer'] == 'Yes' ){
$q="DELETE FROM booking WHERE bId='{$_POST['bid']}'";
$r=mysqli_query($conn, $q) or die("Error in the query:<br><mark>$q</mark>".mysqli_error($conn)) ;
//echo "<form action='msg.php' method='post'>";
}
header("Location:mybooking.php");
//include("footer.php");
?>