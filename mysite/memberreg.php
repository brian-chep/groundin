<!DOCTYPE html>
<html>
<head>
  <title>IMS Registration</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/nnew.css">
<table width="100%" class="title" bordercolor="#000033">
  <tr>
  <th width="190" height="135" align="left" scope="col"><img src="images/logo1.png" width="138" height="119" /></th>
    <th width="960"> 
	<h1>INTERVIEW MANAGEMENT SYSTEM</h1>  
    
    <div class="title">
      <h5>AUTOMATED INTERVIEW PROCESSING PLATFORM(IMS)</h5><br>
      <?php
// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A");
?>
    </div>
</th>
<th></th>
</tr>
</table>
<hr/>
</head>
<body>
	<div class="nav" align="center">
<ul>
<li><a href="index.php">Home</a></li>
<li> <a href="about.php">About</a>
</li>
<li><a href="login.php">Login</a></li>
</ul>
</div>
    <div class="about">
    <p align="center"><strong>PLEASE FILL THE SPACES BELOW</strong></p>
    <p>&nbsp;</p>
    <p>&nbsp; </p>
    <table cellspacing="5" align="center">
      
    	<form action="memberreg.php" method="post" enctype="multipart/form-data">
        <tr><td>USERNAME: </td><td><INPUT type="text" name="username" required></td></tr>
        <tr><td>SURNAME: </td><td><INPUT type="text" name="surname" required></td></tr>
        <tr><td>Other NAME(s):</td><td><INPUT type="text" name="others" required></td></tr>
        <tr><td>CATEGORY</td><td><INPUT type="radio" name="category" value="employer" required>Employer<p/>
        						<INPUT type="radio" name="category" value="applicant" required>Applicant</td></tr>
        <tr><td>EMAIL</td><td><INPUT type="email" name="email" placeholder="@edu.mue.ac.ke" required></td></tr>
        <tr><td>CONFIRM EMAIL</td><td><INPUT type="email" name="mail" placeholder="@edu.mue.ac.ke" required></td></tr>
        <tr><td>PASSWORD </td><td><INPUT type="password" name="pass" required></td></tr>
        <tr><td>RETYPE PASSWORD: </td><td><INPUT type="password" name="pas" required></td></tr>
        <tr><td></td><td><input type="submit" name="signup" value="SIGN UP"></td></tr>
     </form>
     
     </table>
</div>            
    
    <div class="footer">
  <p><a href="www.facebook.com">Facebook</a>   copyright @ 2018 developed by brian
</p></div>
</body>
</html>
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

?>