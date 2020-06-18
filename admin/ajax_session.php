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
	if($_SESSION["cms_user_id"] == ''){
		print 'login';
	}
	else{
		if(isLoginSessionExpired()) {
			print 'session expired';
		}
		@$user_id=$_SESSION["cms_user_id"];
		$sql = mysql_query("SELECT * FROM admin WHERE id='$user_id'") or die(mysql_error());
		while($row = mysql_fetch_object($sql))
		{
			if ($row->user_status=='1') {
				print 'okay';
			}
			else{
				print 'not active';
			}
		}
	}
}
else{
	print 'login';
}

if(isset($_SESSION["hwc_oms_user_id"])) 
{
	if($_SESSION["hwc_oms_user_id"] == ''){
		print 'login';
	}
	else{
		if(isLoginSessionExpired()) {
			print 'session expired';
		}
		else{
			$user_id=$_SESSION["hwc_oms_user_id"];
			$sql = mysql_query("SELECT * FROM hwc_oms_user WHERE user_id='$user_id'") or die(mysql_error());
			while($row = mysql_fetch_object($sql))
			{
				if ($row->user_status !='1'){
					print 'not active';
				}
				else{
					print 'okay';
				}
			}
		}
	}
}
else{
	print 'login';
}
?>