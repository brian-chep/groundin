<?php
session_start();
if(isset($_SESSION['login_admin'])){
//including the database connection file
include("db.php");
 
//getting user from session user
 $admin = $_SESSION['login_admin'];

 
//deleting the row from table
$result = mysqli_query($con, "DELETE FROM users WHERE username='$admin'");
if($result==true){
	session_destroy();
	header("Location:/mysite/index.php");
 }
}
//redirecting to the display page (index.php in our case)
?>
