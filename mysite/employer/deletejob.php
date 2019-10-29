<?php
session_start();
if(isset($_SESSION['login_admin'])){
//including the database connection file
include("db.php");
 
//getting user from session user
 $admin = $_SESSION['login_admin'];
//getting id of the data from url
 $id = $_GET['id'];

 
//deleting the row from table
 $sql = "DELETE FROM jobposted WHERE id='$id'";
$result = mysqli_query($con,$sql);
 
//redirecting to the display page (index.php in our case)
header("Location:view.php");
}
?>