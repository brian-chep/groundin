<?php
session_start();
if(isset($_SESSION['login_admin'])){
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php $id=$_GET['id'];if ($id != '') { echo "View Applicants Record"; } else { echo "Njk";}?></title>
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
  
<table cellspacing="40">
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
$sql = "SELECT * FROM applicants WHERE owner='$owner' && jobid='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
<tr><td>Title</td><td>Applicant</td><td>Resume</td><td>Qualified</td><td>Unqualified</td></tr>
  <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $rew = mysqli_fetch_array($result);

$sq = "select "
        ?>

  <tr><td><?php echo $row['title'];?></td><td><?php echo $row['applicant'];?></td><td><form action="applications.php" method="POST"><input type="hidden" name="id" value="<?php echo $row['id'];?>"><input type="submit" name="view" value="View" > </form></td>
    <td><form action="applications.php" method="POST"><input type="hidden" name="id" value="<?php echo $row['applicant'];?>"><input type="hidden" name="title" value="<?php echo $row['title'];?>"><input type="hidden" name="owner" value="<?php echo $row['owner'];?>">
      <input type="hidden" name="jobid" value="<?php echo $row['jobid'];?>"><input type="submit" name="qualified" value="Send Mail" > </form>
  </td><td><form action="applications.php" method="POST"><input type="hidden" name="id" value="<?php echo $row['applicant'];?>"><input type="hidden" name="title" value="<?php echo $rew['title'];?>"><input type="submit" name="unqualified" value="Send Mail" > </form></td></tr>
	
   <?php
    
  }
} else {
    echo "No applicants yet for the post";
}
$conn->close();
?>	  
  
</table>



<hr/>

</body>
</html>
<?php

if(isset($_POST['view']))
{    
  include_once 'db.php';

  $ids = $_POST['id'];
  $rslt = mysqli_query($con,"SELECT resume FROM applicants WHERE id='$ids'");
  if($rslt->num_rows == true){
    $row = mysqli_fetch_array($rslt);
    echo "<iframe>";
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $row['file']. '"');
header('Content-Transfer-Encoding: binary');
  echo "</iframe";
  }

  else{
      ?>
    <script>alert("No");</script>
  <?php


    }
  }



if(isset($_POST['qualified'])){
  include_once 'db.php';

  $ids = $_POST['id'];
  $title = $_POST['title'];
  $owner = $_POST['owner'];
  $jobid = $_POST['jobid'];

  $sql = "SELECT * FROM users WHERE username='$ids'";
  $result = mysqli_query($con,$sql);
    $user = mysqli_num_rows($result);
    if($user > 0){
      $res = mysqli_fetch_array($result);
      $one=$res['surname'];
      $two=$res['others'];
      $three=$res['email'];
      $four=$res['username'];


    $new= "INSERT INTO qualified (surname,others,email,jobtitle,employer,applicant,jobid)values('$one','$two','$three','$title','$owner','$four','$jobid')";
    $neww=mysqli_query($con,$new);
      
$from = 'fromemailsend@mail';
$to = $res['email'];
$subject = 'your subject';
$message = 'Dear applicant, Your application to' .$title.', to was successful';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$headers .= 'To: Author <' .$to . ' >' . "\r\n";
$headers .= 'From: <'.$from.'>' . "\r\n";
$mail=mail($to, $subject, $message, $headers);
if($mail==true){
  echo "Email Sent";
}else{
  echo "Failed to send your email message, try again";
} 

}else{
  echo "User does not have an email addrress";
}}





  if(isset($_POST['unqualified'])){
    include_once 'db.php';

  $ids = $_POST['id'];
  $title = $_POST['title'];
  $sql = "SELECT * FROM users WHERE username='$ids'";
  $result = mysqli_query($con,$sql);
    $user = mysqli_num_rows($result);
    if($user > 0){
      $res = mysqli_fetch_array($result);
      $pass=$res['password']; 
      
$from = 'admin@mail';
$to = $res['email'];
$subject = 'Unsuccessful';
$message = 'Dear appplicant, We are sorry your application for '.$title.', job was unssuccessful.';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$headers .= 'To: Author <' .$to . ' >' . "\r\n";
$headers .= 'From: <'.$from.'>' . "\r\n";
$mail=mail($to, $subject, $message, $headers);
if($mail==true){
  echo "Email sent";
}else{
  echo "Failed to send your email message, try again";
} 

}else{
  echo "User does not have an email addrress";
}
  }
}
else{
  header("location: /mysite/index.php");
}

?>