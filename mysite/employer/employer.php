<?php
session_start();
if(isset($_SESSION['login_admin'])){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/mysite/css/style.css">
<table width="100%" class="title">
  <tr>
  <th width="190" height="135" align="left" scope="col"><img src="/mysite/images/logo1.png" width="138" height="119" /></th>
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
    <div class="nav">
    <?php
    $_SESSION['login_admin'];?>
    <table width="100%">
    <tr>
      <td width="20px"></td>
      <td><?php echo "<h6> ACCOUNT: " .$_SESSION['login_admin']. "</h6>"; ?></td>
      <td><h6>Logged in as Employer</h6></td>
    </tr> 
    </table>   
  </div>
  <hr/>
  <div class="container" align="left">
<table width="100%" cellspacing="40">


  <h3>Dashboard</h3>
  <tr>
    <td ><a href="employer-prof.php">My profile</a></td>
    
    
  <td><a href="view.php">My Adverts</a></td>
</tr>
<tr>
    <td><a href="postjob.php">Post A Job</a></td>
    
  <td><a href="/mysite/logout.php">Logout</a></td>
</tr>
	
   	  
      
  
</table>
</div>



<hr/><hr/>
<div class="footer">
  <p><a href="www.facebook.com">Facebook</a>   copyright @ 2018 developed by brian
</p></div>
<hr/>
<div class="footer">
</div>
</body>
</html>
<?php
}
else{
  header("location: /mysite/index.php");
}

?>