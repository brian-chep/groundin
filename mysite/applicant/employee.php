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
<script type="text/javascript">
function changeQuestion(answer)
  {
    var count = 0;

 if (count == 0) {
        document.getElementById(answer).style.backgroundColor = "#A9A9A9";        
    }
    else {
        document.getElementById(answer).style.backgroundColor = "yellow";
    }}  

</script>
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
<table width="100%" border="1">
<th width="15%" bgcolor="#6F7D94">
<div class="sidebr" align="left"><br>
 <h3 align="centre"> Dashboard </h3>
  <ul>
      <li><a href="profile.php">My profile</a></li>
      <li><a href="my-resume.php">My Resume</a></li> 
      <li><a href="viewapplied.php">Applied Jobs</a></li><li><a href="/mysite/logout.php">Logout</a></li>
  </ul>
</div>
</th>
<th width="85%"><div class="">

<h1>View Jobs posted</h1>

<?php
// connect to the database
include('db.php');

// number of results to show per page
$per_page = 3;

// figure out the total pages in the database

if ($result = mysqli_query($con,"SELECT * FROM jobposted ORDER BY daypost"))
{
if ($result->num_rows != 0)
{
$total_results = $result->num_rows;
// ceil() returns the next highest integer value by rounding up value if necessary
$total_pages = ceil($total_results / $per_page);

// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
if (isset($_GET['page']) && is_numeric($_GET['page']))
{
$show_page = $_GET['page'];

// make sure the $show_page value is valid
if ($show_page > 0 && $show_page <= $total_pages)
{
$start = ($show_page -1) * $per_page;
$end = $start + $per_page;
}
else
{
// error - show first set of results
$start = 0;
$end = $per_page;
}
}
else
{
// if page isn't set, show first set of results
$start = 0;
$end = $per_page;
}

// display pagination

for ($i = 1; $i <= $total_pages; $i++)
{
if (isset($_GET['page']) && $_GET['page'] == $i)
{
echo $i . " ";
}
else
{
echo "<a href='employee.php?page=$i'> page $i</a> ";
}
} 
echo "</p>";

// loop through results of database query, displaying them in the table
for ($i = $start; $i < $end; $i++)
{
// make sure that PHP doesn't try to show results that don't exist
if ($i == $total_results) { break; }

// find specific row
$result->data_seek($i);
$row = $result->fetch_row();
?>
<hr>

<table cellpadding="2" cellspacing="10" bgcolor="" width="100%" >
    <tr><td><?php echo "JOB NO: " . $row["0"]; ?> </td><td><?php echo "TITLE: " . $row["2"]; ?> </td><td><?php echo "EMPLOYER: " . $row["1"]; ?> </td></tr>
    <tr><td><?php echo "DESCRIPTION: " . $row["3"]; ?> </td></tr>
    <tr><td><?php echo "EXPECTATION: " . $row["4"]; ?> </td><td><?php echo "CATEGORY: " . $row["5"]; ?> </td></tr>
    <tr><td><?php echo "LOCATION: " . $row["6"]; ?> </td><td><?php echo "DAY POSTED: " . $row["7"]; ?> </td></tr>
    <tr><td><?php echo "DATELINE: " . $row["8"]; ?> </td><td><?php echo "LEVEL: " . $row["9"]; ?> </td></tr>
    <tr><td></td><td>
      <a href='application.php?id=<?php echo $row['0'];?>'>Apply</a>
    </td></tr>
    </table>
    <hr>

<?php


}}
else
{
echo "No results to display!";
}




}
// error with the query
else
{
echo "Error: " . $mysqli->error;
}


// close database connection
mysqli_close($con);

?>


</div>
</th>
</table>
<hr/><hr/>

</body>
</html>
<?php

}
else{
  header("location: mysite/index.php");
}



?>