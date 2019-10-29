
<?php
if(isset($_POST['view']))
{    
  include_once 'db.php';

  $ids = $_GET['id'];
  $rslt = mysqli_query($con,"SELECT resume FROM applicants WHERE id='$ids'");
  if($rslt->num_rows == true){
    $row = mysqli_fetch_array($rslt);
    echo "<iframe>";
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $row['resume']. '"');
header('Content-Transfer-Encoding: binary');
  echo "</iframe";
  }

  else{
      ?>
    <script>alert("No");</script>
  <?php


    }
  }
  ?>