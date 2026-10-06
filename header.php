<?php
// Start session at the very top
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $pageTitle; ?> </title>
<link href='mystyles.css' type='text/css' rel='stylesheet'>
<style>
/* your styles here */
</style>
</head>
<body>
<header>
<img src='UTAS-MainLogo.png' width='90px' height='30px'>
<section class='leftPart'>University of Technology and Applied Sciences - </section>
<section class='middlePart'><?php echo "UTAS - Office Hours Management System"; ?></section>
<section class='rightPart'><?php echo date("l jS F Y H:i:sa"); ?></section><br>
</header>

<div class="userBar">
<?php
if(isset($_SESSION['SUID'])) {
    echo "<div class=container>";
    echo "<div class=page-header>";
    echo "<h6> Welcome: {$_SESSION['SUNAME']} <a class=nav-link href=logout.php> Logout </a>";
    echo " </h6></div>";
    echo "</div>";
}
?>
</div>

<section class=content>
<?php
$mo="<mark>"; $mc="</mark>";
?>
