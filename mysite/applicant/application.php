<?php
session_start();
if(isset($_SESSION['login_user'])){
  $id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php $id=$_GET['id'];if ($id != '') { echo "Job Application"; } else { echo "Njk";}?></title>
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
      <td><h3>WELCOME</h3></td>
      <td><?php echo "<h3> ACCOUNT: " .$_SESSION['login_user']. "</h3>"; ?></td>
      <td><h3>Logged in as Applicant</h3></td>
    </tr> 
  </table>
  </div>
  <hr/>
  <table width="100%">
<th width="15%">
<div class="sidebr" align="left"><br>
  <ul>
    <li><a href="index.php">HOME</a></li>
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
   if($id!=''){
    require 'db.php';

    $applicant = $_SESSION['login_user'];

    $rlt = mysqli_query($con,"SELECT * FROM applicants WHERE jobid='$id' && applicant='$applicant'");
    if($rlt->num_rows != 0){
      ?>
    <script>alert("Unsuccessful. You already posted");</script>
  <?php

    }else{
    

    $reslt = mysqli_query($con,"SELECT owner,title FROM jobposted WHERE id='$id'");
    $res = mysqli_fetch_array($reslt);

    $rslt = mysqli_query($con,"SELECT file FROM files WHERE owner='$applicant'");
    $row = mysqli_fetch_array($rslt);


  $owner = $res['owner'];
  $jobid = $id;
  $title = $res['title'];
  $file = $row['file'];


  

$sql ="INSERT into applicants(jobid,applicant,owner,title,resume) values('$jobid','$applicant','$owner','$title','$file')";
  
  $result = mysqli_query($con, $sql);

  if($result>0){
    ?>
    <script>alert("Successfully posted");</script>
  <?php
}
}}

  ?>

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