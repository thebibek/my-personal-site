<?php
session_start();
include 'config.php';
function isLoginSessionExpired() 
{
	$login_session_duration = 3600; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["cms_user_id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}

if(isset($_SESSION["cms_user_id"])) 
{
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	}
	@$user_id=$_SESSION["cms_user_id"];
	$sql = mysql_query("SELECT * FROM team WHERE id='$user_id'") or die(mysql_error());
	while($row = mysql_fetch_object($sql))
	{
		if ($row->user_status=='1') {}
		else{
			echo "<script>location='logout.php'</script>";
		}
	}
	$user_id = $_SESSION["cms_user_id"];
	$user_fullname = $_SESSION["cms_user_fullname"];
	$user_email = $_SESSION['cms_useremail'];
}
else{
	echo "<script>location='login.php?error=Please login'</script>";
}
?>