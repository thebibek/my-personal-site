<?php
include('config.php');

if(isset($_GET['value'])){
	$value = $_GET['value'];
	$id = $_GET['id'];
	$access_field = $_GET['access_field'];
echo $access_field;
	print $value;
	$sql = mysql_query("UPDATE admin SET $access_field = $value WHERE id='$id'") or die(mysql_error());

}
?>