<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css">
<table width="100%" class="title">
  <tr>
  <th width="190" height="135" align="left" scope="col"><img src="images/logo1.png" width="138" height="119" /></th>
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
<ul>
<li><a href="about.php">About</a></li>
<li><a href="login.php">Login</a></li>
<li><a href="memberreg.php">Register</a></li>
</ul>
</div>
	<div class="containerws">
    	<form action="recoverypass.php" method="post">
    	Enter you Email<input type="email" name="recoverymail" border="1">
        <input type="submit" name="recovery" value="Recover">
        </form>
    </div>
 <?php
  if(isset($_POST["recovery"])){
    $con = mysqli_connect("localhost", "root", "", "login");
    $mail = $_POST["recoverymail"];
    
      $sql = "Select * from users where email='$mail'";
    $result = mysqli_query($con,$sql);
    $user = mysqli_num_rows($result);
    if($user > 0){
      $res = mysqli_fetch_array($result);
      $pass=$res['password']; 
      
$from = 'fromemailsend@mail';
$to = $res['email'];
$subject = 'your subject';
$message = 'your<br>message<br>in html code' .$res['password'];
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$headers .= 'To: Author <' .$to . ' >' . "\r\n";
$headers .= 'From: <'.$from.'>' . "\r\n";
mail($to, $subject, $message, $headers);
if($mail==true){
  echo "Your Password has been sent to your email id";
}else{
  echo "Failed to Recover your password, try again";
} 

}else{
  echo "User does not exist in the Database";
}
}
?>

</body>
</html>
