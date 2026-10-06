<style>
li { display:inline; list-style-type:none; padding-right:20px;}
</style>
<head>
    <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand navbar-dark bg-success">
      <div class="container-fluid" style="width:auto">
        <a class="btn btn-info" href="index.php">
            <img src='home.PNG' width='35px' height='30px'>
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- NAVBAR LINKS -->
          <li class="nav-item">
            <a class="nav-link active" href="department.php">Department</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ohms1.php">OHMS</a>
          </li>
       
<?php

if(isset($_SESSION['SUTYPE'])){
if($_SESSION['SUTYPE'] == 'A' ){
 echo '<li class="nav-item"><a class="nav-link" href="seastaff.php"> Update Staff </a></li>';
 echo '<li class="nav-item"><a class="nav-link" href="studentse.php"> Update Student</a></li>';
 echo '<li class="nav-item"><a class="nav-link" href="excel.php?id='.$_SESSION['SUID'].'"> Export</a></li>';
 }
  if($_SESSION['SUTYPE'] == 'F' ){
 echo '<li class="nav-item"><a class="nav-link" href="officHours.php?id='.$_SESSION['SUID'].'"> MY Office Hours</a></li>';
 echo '<li class="nav-item"><a class="nav-link" href="staffShwo.php?id='.$_SESSION['SUID'].'"> My Profile</a></li>';
 echo '<li class="nav-item"><a class="nav-link" href="excel.php?id='.$_SESSION['SUID'].'"> Export</a></li>';
 echo '<li class="nav-item"><a class="nav-link" href="addohf.php?id='.$_SESSION['SUID'].'"> Add Office Hour</a></li>';
  echo '<li class="nav-item"><a class="nav-link" href="staff.php?id='.$_SESSION['SUID'].'"> Student Booking</a></li>';
 }
  if($_SESSION['SUTYPE'] == 'S' ){
 echo '<li class="nav-item"><a class="nav-link" href="Search.php"> Search Offic Hours and Staff</a></li>';
 echo '<li class="nav-item"><a class="nav-link" href="mybooking.php">My Booking</a></li>';

 }
}

?>
		<li class="nav-item">
            <a class="nav-link" href="aboutUs.php">About us</a>
          </li>
		<li class="nav-item">
            <a class="nav-link" href="contactUs.php">Contact us</a>
          </li>


    <?php
   if(!isset($_SESSION['SUTYPE'])){
echo "<li class=nav-item><a class='btn btn-primary' href=loginForm.php>Login</a></li>";
   }
?>
  </ul>
      </div>
    </nav>
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    ></script>