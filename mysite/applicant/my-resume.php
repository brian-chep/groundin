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
    <li><a href="index.php">HOME</a></li>
      <li><a href="employee.php">Apply Job</a></li>
      <li><a href="my-resume.php">My Resume</a></li> 
      <li><a href="viewapplied.php">Applied Jobs</a></li><li><a href="/mysite/logout.php">Logout</a></li>
      
      
  </ul>
</div>
</th>
<th width="85%">
<div class="sideprof">
  <div class="containerprofile">
    Upload your Resume
    <br>
    Maximum file size(1 MB)
    <form method="post" action="my-resume.php" enctype="multipart/form-data">
      <input type="file" name="file"><br>
      <br>
      <input type="submit" name="btn-upload" value="Upload"><br>
      <input type="submit" name="btn-update" value="Update"><br>
      <input type="submit" name="btn-view" value="View">

    </form>

 
   


    <?php

if(isset($_POST['btn-upload']))
{    
  include_once 'db.php';
  $applicant = $_SESSION['login_user'];
  $rslt = mysqli_query($con,"SELECT owner FROM files WHERE owner='$applicant'");
  if($rslt->num_rows != 0){
      ?>
    <script>alert("Unsuccessful. You already have a Resume. You can update instead");</script>
  <?php

    }else{
    $row = mysqli_fetch_array($rslt);

    $file = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $user = $_SESSION['login_user'];

   
       $sql="INSERT INTO files(file,owner) VALUES('$file','$user')";
       $result= mysqli_query($con,$sql);
       if($result>0){
        ?>
        <script>
        alert('successfully uploaded your Resume');
        window.location.href='my-resume.php?success';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('error while uploading file');
        window.location.href='my-resume.php?fail';
        </script>
        <?php
    }
}
}

if(isset($_POST['btn-update']))
{    
  if($_FILES[file] !=''){
  include_once 'db.php';

  $applicant = $_SESSION['login_user'];
  $rslt = mysqli_query($con,"SELECT owner FROM files WHERE owner='$applicant'");
  if($rslt->num_rows == false){
      ?>
    <script>alert("Unsuccessful. You dont have a resume yet. Upload first");</script>
  <?php

    }else{

    $file = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $user = $_SESSION['login_user'];

        $sql="UPDATE files SET file='$file' WHERE owner='$user'";
        $result = mysqli_query($con,$sql);
        if($result>0){
        ?>
        <script>
        alert('successfully updated your Resume');
        window.location.href='my-resume.php?success';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('error while uploading file');
        window.location.href='my-resume.php?fail';
        </script>
        <?php
    }
  }

}else{
        ?>
        <script>
        alert('select a pdf file first');
        window.location.href='my-resume.php?success';
        </script>
        <?php
    }

}

if(isset($_POST['btn-view']))
{    
  include_once 'db.php';

  $applicant = $_SESSION['login_user'];
  $rslt = mysqli_query($con,"SELECT * FROM files WHERE owner='$applicant'");
  if($rslt->num_rows == true){
    $row = mysqli_fetch_array($rslt);
    echo "<iframe>";
    header('Cache-Control:');
header('Pragma:');
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $row['file']. '"');
header('Content-Transfer-Encoding:* binary');
  echo "</iframe";
  }

  else{
      ?>
    <script>alert("Unsuccessful. You dont have a resume yet. Upload first");</script>
  <?php


    }
  }

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