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
      <td></td>
      <td><?php echo "<h6> ACCOUNT: " .$_SESSION['login_admin']. "</h6>"; ?></td>
      <td><h6>Logged in as Employer</h6></td>
    </tr> 
    </table>   
  </div>
  <hr/>
  <table width="100%">
<th width="15%" bgcolor="#6F7D94">
<div class="sidebr" align="left"><br>
	<ul>
    <ul>
    <li><a href="employer.php">Dashboard</a></li>
      <li><a href="postjob.php">Post job</a></li> <li><a href="employer-prof.php">My Profile</a></li>
      <li><a href="view.php">My Adverts</a></li> 
      <li><a href="/mysite/logout.php">Logout</a></li>
  </ul>
</div>
</th>
<th width="85%"><div class="">
  <div class="containerws">
  <strong class="red">All fields with * should be filled</strong>
    <table cellpadding="22" cellspacing="10">
    <form action="postjob.php" method="post">
      <tr><td width="65">Job title: </td><td width="162"><INPUT type="text" name="title"></td></tr>
        <tr><td height="64">Job desription: </td><td><textarea  name="description" rows="6" cols="30"></textarea></td></tr>
        <tr><td height="64">Expectation: </td><td><INPUT type="textfield"  name="expectation"></td></tr>
        <tr><td>Category :</td><td>
          <select name="category">
            <option></option>
        <option value="internship">INTERNSHIP</option>
        <option value="contractual">CONTRACTUAL</option>
        <option value="temporary">TEMPORARY</option>
        <option value="permanent">PERMANENT</option>
        </select> <h>* </h
        ></td></tr>
        <tr><td>Location: </td><td><INPUT type="text" name="location"></td></tr>
        <tr><td>Dateline: </td><td><input type="date" name="dateline"></td></tr>

                <tr><td height="51">Study level:</td><td><select
                  name="level">
                  <option></option>
        <option value="UNDERGRADUATE">UNDERGRADUATE</option>
        <option value="POSTGRADUATE">POSTGRADUATE</option>
        <option value="POSTGRADUATE">POSTGRADUATE</option>


        </select>
        </td></tr>
        <tr><td></td><td><input type="submit" name="postjob" value="post"></td></tr>

    </form>
  </table>
  </div>
  </div>
</th>
</table>
<hr/><hr/>
</body>
</html>
<?php


if(isset($_POST['postjob'])){

  require 'db.php';

  $owner = $_SESSION['login_admin'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $expectation = $_POST['expectation'];
  $category = $_POST['category'];
  $location = $_POST['location'];
  $dateline = $_POST['dateline'];
  $level = $_POST['level'];


$sql ="INSERT into jobposted(owner,title,description,expectation,category,location,dateline,level) values('$owner','$title','$description','$expectation','$category','$location','$dateline','$level')";
  
  $result = mysqli_query($con, $sql);

  if($result==true){
    ?>
    <script>alert("Successfully posted");</script>
    
    <link rel="stylesheet" href="css/style.css">
<form action="employer.php">
    <input type="submit" value="BACK">
    </form>
<form action="view.php">
    <input type="submit" value="VIEW JOB POSTED">
    </form>

<?php
  }
}}


else{
  header("location: /mysite/login.php");
}

?>