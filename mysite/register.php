<?php 
if(isset($_POST['signup'])){
	//CONNECT TO SERVER
	require "db.php";

$result = mysqli_query($con, "SELECT * FROM users"); 
// using mysqli_query instead
        
      $res = mysqli_fetch_array($result);

      $usern = $res['username'];
      $mails = $res['email'];


	$username = $_POST['username'];
	$surname = $_POST['surname'];
	$others = $_POST['others'];
	$category = $_POST['category'];
	$email = $_POST['email'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$pas = $_POST['pas'];
	
	if($email!= $mails){
		if($username != $usern){
	if($email==$mail && $pass == $pas){

	$query ="INSERT into users(username,surname,others,category,email,cemail,password,cpassword) values('$username','$surname','$others','$category','$email','$mail','$pass','$pas')";
	$result =mysqli_query($con, $query);
	
	if($result>0){
		?>
		<script>alert("Registration was successful. Please login to Proceed");</script>
		<a href='login.php'> LOGIN</a>
		<?php
		}
	else{
		echo "did not submit";
		
	}}else{
		?>

		<script>alert("Username or password does not match");</script>
		<a href='memberreg.php'> TRY AGAIN</a>
		<?php

	}}else{
		?>
		<script>alert("Username already used");</script>
		<a href='memberreg.php'> TRY AGAIN</a>
		<?php
	}}
	else
	{?>
		<script>alert("Email already used");</script>
		<a href='memberreg.php'> TRY AGAIN</a>
		<?php
	}

}


if(isset($_POST['postjob'])){

	require 'db.php';

	$title = $_POST['title'];
	$description = $_POST['description'];
	$expectation = $_POST['expectation'];
	$category = $_POST['category'];
	$location = $_POST['location'];
	$dateline = $_POST['dateline'];
	$level = $_POST['level'];
	$vitae = addslashes($_FILES['vitae']['tmp_name']);
 	$imagename = addslashes($_FILES['vitae']['name']);
 	$vitae = file_get_contents($vitae);
 	$vitae = base64_encode($vitae);
 	
 	session_start();
 	$owner = $_SESSION['login_admin'];



$query ="INSERT into job(owner,title,description,expectation,category,location,dateline,level,vitae) values('$owner','$title','$description','$expectation','$category','$location','$dateline','$level','$vitae')";
	
	$result = mysqli_query($con, $query);

	if($result==1){
		?>
		<script>alert("Invalid username or password");</script>
		
		<link rel="stylesheet" href="css/style.css">
<form action="employer.php">
    <input type="submit" value="BACK">
    </form>
<form action="view.php">
    <input type="submit" value="VIEW JOB POSTED">
    </form>

<?php
	}
}

?>


