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
<th width="15%">
<div class="sidebr" align="left"><br>
  <ul>
    <li><a href="employer.php">Dashboard</a></li>
      <li><a href="postjob.php">Post job</a></li> <li><a href="employer-prof.php">My Profile</a></li>
      <li><a href="view.php">My Adverts</a></li> 
      <li><a href="/mysite/logout.php">Logout</a></li>
  </ul>
</div>
</th>
<th width="85%">
  <?php
  if($_GET['id']){
    require "db.php";
    $ids=$_GET['id'];

    $rslt = mysqli_query($con,"SELECT * FROM qualified WHERE jobid='$ids'");
  if($rslt->num_rows == true){?>
<table width="100%" cellspacing="15">
  <tr><td>Surname</td><td>Other Names</td><td>Email</td><td>Job Title</td></tr>
  <hr>
  <?php
    $row = mysqli_fetch_array($rslt);
    ?>
<tr><td><?php echo $row['surname'];?></td><td><?php echo $row['others'];?></td><td><?php echo $row['email'];?></td><td><?php echo $row['jobtitle'];?></td></tr>

</table>
<hr>


    <?php
  }
  else
  {
    echo "None have qualied yet";
  }

}
  ?>
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