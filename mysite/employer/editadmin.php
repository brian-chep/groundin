<?php
// including the database connection file
include_once("db.php");
 
if(isset($_POST['update']))
{        
    $username=$_POST['username'];
    $surname=$_POST['surname'];
    $pass=$_POST['pass'];
    $dob=$_POST['dob'];
    $surname=$_POST['surname'];
    $group=$_POST['group'];    
    
    // checking empty fields
    if(empty($pass) || empty($dob) || empty($group)) {            
        if(empty($pass)) {
            echo "<font color='red'>Password is empty.</font><br/>";
        }
        
        if(empty($dob)) {
            echo "<font color='red'>D.O.B field is empty.</font><br/>";
        }
        
        if(empty($group)) {
            echo "<font color='red'>Employer Group field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $sql = "UPDATE users SET username='$username',dob='$dob',employer='$group' WHERE username='$username'";
        $result = mysqli_query($con,$sql);
        if($result==true){
        //redirectig to the display page. In our case, it is index.php
        header("Location: employer-prof.php");
    }}
}
    session_start();


 $username = $_SESSION['login_admin'];
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $res = mysqli_fetch_array($result);
 

?>
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
<table width="100%" cellspacing="20">
    <tr>
<th width="15%" bgcolor="#6F7D94">
  
<div class="sidebr"><br>
    <ul>
    <li><a href="employer.php">Dashboard</a></li>
      <li><a href="postjob.php">Post job</a></li> <li><a href="employer-prof.php">My Profile</a></li>
      <li><a href="view.php">My Adverts</a></li> 
      <li><a href="/mysite/logout.php">Logout</a></li>
  </ul>
</div>
</th>
<th width="85%">
    <div class="containerws">
       <P class="heades"> Fill the blank spaces and update any other information necessary:</p>
    <form name="form1" method="post" action="editadmin.php">
        <table border="0" cellspacing="20">
            <tr> 
                <td>USERNAME / COMPANY: </td>
                <td><input type="text" name="username" value="<?php echo $res['username'];?>"></td>
            </tr>
            <tr> 
                <td>SURNAME: </td>
                <td><input type="text" name="surname" value="<?php echo $res['surname'];?>"></td>
            </tr>
            <tr> 
                <td>OTHERS: </td>
                <td><input type="text" name="others" value="<?php echo $res['others'];?>"></td>
            </tr>
            <tr> 
                <td>DATE OF BIRTH: </td>
                <td><input type="date" name="dob" value="<?php echo $res['dob'];?>"></td>
            </tr>
            <tr> 
                <td>EMAIL: </td>
                <td><input type="text" name="email" value="<?php echo $res['email'];?>"></td>
            </tr>
            <tr>
                <td>EMPLOYER GROUP</td>
                <td><INPUT type="radio" name="group" value="employer" required>Self employer<p/>
                                <INPUT type="radio" name="group" value="Self employer" required>Company
                            <p/>
                                <INPUT type="radio" name="group" value="Government" required>Government</td></tr>
            
            <tr> 
                <td>CONFIRM PASSWORD: </td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

</div>
</td>
</table>
</body>
</html>
