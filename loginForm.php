<?php
include('header.php');include('mylib.php');include("dbconnect.php");
?> 
<style>
li { display:inline; list-style-type:none; padding-right:20px;
</style>
  <?php
  include('menu.php');

?>
    <div class="img-container" >
      <img src="men.jpg" width="150" height="150" style='margin: 15px 0 0 0;'>
	  
    </div>
  </body>
</html>

<?php
if(isset($_GET['error']))
if($_GET['error']==1)
	  echo "<br><h4 style='text-align:center;'>$mo Login Fial $mc</h4><br>";
		//echo<h2text-align:center;> "$mo Login Fial $mc "</h1>
echo "\n<form action=login.php method=post style='width:40%;background-color:#FFFAF0;'>\n";
echo "<h2 style='text-align:center;margin:2px auto;'>Login </h2>\n";
echo "* ID: <input type=text name=uid style='width:190px;'><hr>\n";
echo "* Password:<input type=password name=ps style='width:190px;'><hr>\n";
echo "<p style='margin:5px auto;text-align:center;'><input type=submit name=add value='Login'>\n
<input type=reset name=clear value='Reset Data'>\n

</p></form>\n";
include('footer.php');
echo "</body></html>\n";
?>