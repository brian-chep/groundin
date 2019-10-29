<?php
session_start();
if(isset($_SESSION['login_user'])){
?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Section</title>
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
    $_SESSION['login_user'];?>
    <table width="100%" height="30px">
    <tr>
      <td width="20px"></td>
      <td></td>
      <td><?php echo "<h6> ACCOUNT: " .$_SESSION['login_user']. "</h6>"; ?></td>
      <td><h6>Logged in as Applicant.</h6></td>
    </tr> 
  </table>
  </div>
  <hr/>
  <table width="100%">
<th width="15%" bgcolor="#6F7D94">
<div class="sidebr" align="left"><br>
  <ul>
      <li><a href="employee.php">BACK</a></li>
      <li><a href="my-resume.php">My Resume</a></li> 
      <li><a href="viewapplied.php">Applied Jobs</a></li><li><a href="/mysite/logout.php">Logout</a></li>
      
      
  </ul>
</div>
</th>
<th width="85%">
<div class="sideprof">
  <div class="containerprofile">

  
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_SESSION['login_user'];
$sql = "SELECT * FROM applicants WHERE applicant='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {    ?>
    
    <table cellpadding="22" cellspacing="10" bgcolor="" width="100%" >
    <tr><td><?php echo "Day applied: " . $row["dayapplied"]; ?> </td><td><?php echo "Employer: " . $row["owner"]; ?> </td></tr>
   

    </table>
    <hr>
<?php }}
else{
  echo "You havent made any applications yet";
} ?>

    </div>
  </div>
</th>
</table>
<hr/><hr/>
</body>
</html>
<?php
}
else{
  header("location: /mysite/index.php");
}

?>