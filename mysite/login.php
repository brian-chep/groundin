<?php
session_start();
if (isset($_SESSION['login_user'])) {
	header("location: applicant/employee.php");
	}
if (isset($_SESSION['login_admin'])) {
	header("location: employer/employer.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login to IMS</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/nnew.css">
<div class="title">
<table width="100%">
  <tr>
  <th width="190" height="135" align="left" scope="col"><img src="images/logo1.png" width="138" height="119" /></th>
    <th width="960"> 
	<h1>INTERVIEW MANAGEMENT SYSTEM</h1>  
 
      <h5>AUTOMATED INTERVIEW PROCESSING PLATFORM(IMS)</h5><p/>
      <?php
// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A"); ?>
   
</th>
<th></th>
</tr>
</table>
 </div>
<hr/>
</head>

<body>
<div class="nav">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="memberreg.php">Register</a>
</li>
<li></li>
</ul>
</div>
<div class="container" align="center">
  <p><img src="images/index.png"><br/>  
    </p>
    <br>

  <p>USERNAME:</p>
  <p/>
  <form action="login.php" method="post">
    <input type="text" name="uname" id="uname" placeholder="Enter Username"> 
    <br/>
    <i class="fa fa-unlock"></i>
    <br>
  PASSWORD:<p/>
    <input type="password" name="pass" id="pass" placeholder="**************"><br>
    <input type="checkbox" name="remember" value="1">
    <br> Remember Me<p/>
    <p/>    
	<input type="submit" name="login" value="LOGIN">
</form>
  <p><br>
    Forgot Password<br>
  </p>
  <form action="recoverypass.php">
    <input type="submit" value="RESET">
    </form>
  <p><br>
    </form>
  
</div>
    
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr/>
<div class="footer">
  <p><a href="www.facebook.com">Facebook</a>   copyright @ 2018 developed by brian
</p></div>
</body>
</html>


<?php 
//If the form is submitted or not.

if (isset($_POST['login']) ){

//Start the Session
	require('db.php');

//3.1.1 Assigning posted values to variables.
$username = $_POST['uname'];
$password = $_POST['pass'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);

if ($count == 1){
	$res = mysqli_fetch_array($result);
	
		$cate= $res['category'];
		$employ= "employer";
		$appli = "applicant";
    $admin = "admin";
		if($cate== $appli){
			$_SESSION['login_user'] = $username;
header("location: applicant/employee.php");

		}
	if($cate==$employ){
		$_SESSION['login_admin'] = $username;
header("location: employer/employer.php");

	}
  if($cate==$admin){
    $_SESSION['admin_user'] = $username;
header("location: admin/admin.php");

  }
	


}else{
?>
<script>alert("Invalid username or password");</script>
<?php
}}
?>