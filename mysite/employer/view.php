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
      
      <td><?php echo "<h6> ACCOUNT: " .$_SESSION['login_admin']. "</h>"; ?></td>
      <td><h6>Logged in as Employer</h6></td>
    </tr> 
    </table>    
  </div>
  <hr/>
<table width="100%" border="1"  height="10%">
<th width="15%" bgcolor="#6F7D94">
<div class="sidebr" align="left"><br>
  <ul>
    <li><a href="employer.php">Dashboard</a></li>
      <li><a href="postjob.php">Post job</a></li> <li><a href="employer-prof.php">My Profile</a></li>
      <li><a href="view.php">My Adverts</a></li> 
      <li><a href="/mysite/logout.php">Logout</a></li>
  </ul>
</div>
</th>
<th width="85%"><div class="">

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

$owner = $_SESSION['login_admin'];
$sql = "SELECT * FROM jobposted WHERE owner='$owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {    ?>
    
    <table cellpadding="22" cellspacing="10" bgcolor="" width="100%" >
    <tr><td><?php echo "JOB NO: " . $row["id"]; ?> </td><td><?php echo "TITLE: " . $row["title"]; ?> </td></tr>
    <tr><td><?php echo "dateline: " . $row["dateline"]; ?> </td><td><?php echo "level: " . $row["level"]; ?> </td></tr>
    <tr><td><?php echo "description: " . $row["description"]; ?> </td><td><?php echo "expectation: " . $row["expectation"]; ?> </td></tr>
    <tr><td><?php echo "category: " . $row["category"]; ?> </td><td><?php echo "location: " . $row["location"]; ?> </td></tr>
    <tr><td><form action="view.php" method="post" onClick="return confirm('Are you sure you want to delete this post?')">
      <input type="submit" name="deletejob" value="Delete Post">
    </form></td>
      <td>
        <a href='applications.php?id=<?php echo $row['id'];?>'>View Applicants</a>
      </td>
    </tr>
    <tr><td>
        <a href='qualified.php?id=<?php echo $row['id'];?>'>View Qualified</a>
      </td></tr>

    </table>
    <hr>
    
    <?php
     if(isset($_POST['deletejob'])){
      require ("db.php");
      
      //deleting the row from table
      $todelete =$row["id"]; 
 $sql = "DELETE FROM jobposted WHERE id='$todelete'";
$result = mysqli_query($con,$sql);
if($result=true){
  header("location: view.php");
}
 
  
  }
}} else {
    echo "0 results";
}
$conn->close();
?> 

</div>
</th>
</table>
<hr/><hr/>
<div class="footer">
  <p><a href="www.facebook.com">Facebook</a>   copyright @ 2018 developed by brian
</p></div>
</body>
</html>
<?php
}
else{
  header("location: /mysite/index.php");
}

?>