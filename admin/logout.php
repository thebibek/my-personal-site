<?php
include('config_session.php');
$url = "login.php";
// $update = mysql_query("UPDATE hwc_oms_user SET user_loginstatus = 0, user_session_id = ' ' WHERE user_id = $user_id") or die(mysql_error());
if(isset($_GET["session_expired"])) {
	// $insert = mysql_query("INSERT INTO hwc_oms_user_log (user_id,action,log_date,log_time) VALUES($user_id,'Logout by $user_fullname throught session expired',curdate(),curtime())") or die(mysql_error());
	$url .= "?session_expired=" . $_GET["session_expired"];
}
// else{
// 	$insert = mysql_query("INSERT INTO hwc_oms_user_log (user_id,action,log_date,log_time) VALUES($user_id,'Logout by $user_fullname',curdate(),curtime())") or die(mysql_error());
// }
header("Location:$url");
session_destroy();
exit;
?>