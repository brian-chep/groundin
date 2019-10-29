<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to IMS</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/nnew.css">
<div class="title">
<table width="100%">
  <tr>
  <th width="190" height="135" align="left" scope="col"><img src="images/logo1.png" width="138" height="119" /></th>
    <th width="960"> 
	<h1>INTERVIEW MANAGEMENT SYSTEM</h1>  
 
      <h5>AUTOMATED INTERVIEW PROCESSING PLATFORM(IMS)</h5><p/>
      <?php
// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A"); ?>
   
</th>
<th></th>
</tr>
</table>
 </div>
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
<table height="400px">
 <p align="center"> Top job opportunities being offered:</p>
 
<div align="center">register and be a member to have access to lots of opportunities
</div> 
</table>
    
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr/>
<div class="footer">
  <p><a href="www.facebook.com">Facebook</a>   copyright @ 2018 developed by brian
</p></div>
</body>
<script>

    document.getElementById('change').onclick = changeColor;   

    function changeColor() {
        document.body.style.color = "purple";
        return false;
    }   

</script>
</html>

