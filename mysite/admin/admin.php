<?php
session_start();
if(isset($_SESSION['admin_user'])){
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
    $_SESSION['admin_user'];?>
    <table width="100%">
  
    <tr>
      <td width="20px"></td>
      <td></td>
      <td><?php echo "<h6> ACCOUNT: " .$_SESSION['admin_user']. "</h6>"; ?></td>
      <td><h6>Logged in as system Admin.</h6></td>
      <td><a href="/mysite/logout.php">Logout</a></td>
    </tr> 
  </table>
  </div>
  <hr/>
  <body>
    <div>
      
      <table width="80%" align="center" border="1">
        <tr><td colspan="2">No of users</td></tr>
        <tr><td>ghe</td><td>wgef</td></tr>
        <tr><td>No of Applications</td></tr>
        <tr><td></td></tr>
        </table>
    </div>
  </body>
</html>
<?php
}
else{
  header("location: index.php");
}

?>