<?php
	session_start();
	
	if(isset($_COOKIE['uname']) and isset($_COOKIE['pass'])){
	$username = $_COOKIE['uname'];
	$password = $_COOKIE['pass'];
		
	setcookie('uname',$username, time()-1);
	setcookie('pass',$password, time()-1);
	}
	if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
	
?>
