<?php
$con = mysql_connect("localhost", "root", "");

if (!$con)
{
	die("error in database connection");
}

$db = mysql_select_db ("thebibek");

if (!$db)
{
	die("Error in Database Selection");
}
?>