<?php
function DisplayErrors(){
	global $errors;
	echo "<h2><span style='color:red;'>
	Could Not Save or process data.</span> T
	he following errors <b>found</b> in data inputs</h2>";
	echo "<ol>";
	foreach($errors as $k=>$v){
		echo "<li><mark>$v</mark></li>";
	}
	echo "</ol>";
	$msg ="<p style='text-align:left;";
	$msg.="width:30%;";
	//$msg.=" /* background-color:pink;*/";
	$msg.="'>";
	$msg.="Click <a href=javascript:history.back();>";
	$msg.="here to correct these errors</a></p>";
	echo $msg;
}
?>