<?php
//including the database connection file
include("db.php");
 
//getting user from session user
session_start();
 $user = $_SESSION['login_user'];

 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE username='$user'");
 
//redirecting to the display page (index.php in our case)
header("Location:/mysite/index.php");
}
?>