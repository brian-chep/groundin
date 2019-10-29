<?php 
if(isset($_POST['upload']) ) {


 $con=mysqli_connect("localhost","root","","login");

 	$uname =$_POST['uname'];
 	$email = $_POST['email'];
 	$image = addslashes($_FILES['image']['tmp_name']);
 	$imagename = addslashes($_FILES['image']['name']);
 	$image = file_get_contents($image);
 	$image = base64_encode($image);

 $query = "INSERT INTO upload(username,email,image,imagename ) VALUES ('$uname', '$email', '$image', '$imagename')";
 $myry=mysqli_query($con,$query);
 if($myry==true)
 {
 	echo "successful";
 }else{
 	echo "unsuccesful";
 }

$sql = "SELECT * FROM upload";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["username"]. " - Name: " . $row["id"]. " " . $row["imagename"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();
 }
 ?>
 <form action="trial.php" method="post" enctype="multipart/form-data">
 USER NAME<input type="text" name="uname"><br>
EMAIL<input type="email" name="email"><br>
<input type="file" name="image" /><br>
<input type="submit" name="upload" value=" Upload ">
</form>