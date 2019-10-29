
<?php
// including the database connection file
include_once("db.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];    
    
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE username='$username'");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
    session_start();


 $username = $_SESSION['login_user'];
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $res = mysqli_fetch_array($result);
 
while($res==1)
{
    $username = $res['username'];
    $surname = $res['surname'];
    $others = $res['others'];
    $email = $res['email'];
    $pass = $res['mypassword'];
    
}
?>
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
<div class="nav">
    <?php
    $_SESSION['login_user'];?>
    <table width="100%" height="30px">
    <tr><td><h3>WELCOME</h3></td>
      <td><?php echo "<h3> ACCOUNT: " .$_SESSION['login_user']. "</h3>"; ?></td>
      <td><h3>Logged in as Applicant</h3></td>
    </tr> 
  </table>
  </div>
  <hr/>
 
<body>
    <table width="100%">
<th width="15%">
<div class="sidebr" align="left"><br>
    <ul>

      <li><a href="employee.php">BACK</a></li>
      <li><a href="my-resume.php">My Resume</a></li> 
      <li><a href="viewapplied.php">Applied Jobs</a></li><li><a href="/mysite/logout.php">Logout</a></li>
      
      
  </ul>
</div>
</th>
<th width="85%">

    <div class="containerws">
        <P class="heades"> Fill the blank spaces and update any other information necessary:</p>
    <form name="form1" method="post" action="edit.php">
        <table border="0" cellspacing="20">
            <tr> 
                <td>USERNAME: </td>
                <td><input type="text" name="name" value="<?php echo $res['username'];?>"></td>
            </tr>
            <tr> 
                <td>SURNAME: </td>
                <td><input type="text" name="name" value="<?php echo $res['surname'];?>"></td>
            </tr>
            <tr> 
                <td>OTHERS: </td>
                <td><input type="text" name="name" value="<?php echo $res['others'];?>"></td>
            </tr>
            <tr> 
                <td>EMAIL: </td>
                <td><input type="text" name="name" value="<?php echo $res['email'];?>"></td>
            </tr>
            <tr> 
                <td>DATE OF BIRTH: </td>
                <td><input type="date" name="age" value="<?php echo $res['dob'];?>"></td>
            </tr>
            <tr> 
                <td>CONFIRM PASSWORD: </td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</P></div></th></table>
</div>
</body>
</html>
