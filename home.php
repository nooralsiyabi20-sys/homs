<!DOCTYPE html>

<html>
<head>
    <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
</head>
<body> 
<?php
include('header.php');
//session_start();
if(!isset($_SESSION['SUID'])){
 header("Location: error.php?ec=1");
 exit;
 }
 else {

?> 

<div class="container">
<frameset rows="133,*,64">
	<frame name="top" noresize="noresize" scrolling="no" src="header.php">
	<frameset cols="150,*">
</div>
<div>
<?php
include "menu.php";
?>
</div>
<div class="container">
<table style="border:solid blue 0px; width:100%; height:auto;">
<tr><td colspan=2 style='text-align:center;'><h2>Dean's Message</h2></td></tr>
<tr> 
     <td style="text-align: left;"> 
		
		<div class="item" >
        <img src='deans.jpg' width="170" height="200" style="margin:0 0 0 15px;"> 
        <h3>Dr. Hafedh Said Al Rahbi</h3>
        <h4>UTAS-Nizwa Dean</h4>
		</div>
	 </td>
	 <td>
	 <div class="item" style="width:100%">
	 
	 <p align="justify"><i><cite>A <b>teamwork</b> </cite>is an achievement tool around the world, which takes
	  along the active involvement  </p> <p align="center"><span style="text-align:center;">of the students <br>by the students <br>and for the students <br></span></p><p>in partnership with Faculty. UTAS-Nizwa is always 
	  committed to the pursuit of skills, knowledge and abilities; 
	  <br>----  These are our strengths</i></p>
	  </div>
	 </td>
</tr>
</table>

</div>

	</frameset>

	<frame name="bottom" noresize="noresize" scrolling="no" src="footer.php">
	
</frameset>


	</body>
</html>
<?php
include('footer.php');
 }
?>
