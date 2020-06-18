<?php 
	function store_log($user_id,$action)
	{
		$sql = mysql_query("INSERT INTO action_log (user_id, action, entry_date, entry_time) VALUES ('$user_id', '$action', CURDATE(), CURTIME());") or die(mysql_error());
	}
?>