function session_log(){
	$.ajax({
		type: "POST",
		url: "ajax_session.php",
		data: "online",
		async: true,
		cache: false,
		timeout:50000,
		 
		success: function(data){
			if (data == 'session expired') {
				location = 'logout.php?session_expired=1';
			}
			else if (data == 'login' || data == 'not active') {
				location = 'logout.php';
			}
			else if (data == 'okay') {
				setTimeout(session_log, 100);
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			addmsg("error", textStatus + " (" + errorThrown + ")");
			setTimeout(
			session_log,
			15000);
		}
	});
};
$(function(){
	session_log();
});