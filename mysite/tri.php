<?php

    $servername = "localhost";
    $username   = "root";
    $dbname     = "db_dat";
    $password   = "";


    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $passno="";
    $doi="";
    $doe="";
    $poi="";
    $empid='';
    $emp_name='';
    $desg='';
    $comp_add='';
    $dob='';
    $img='';


   if (isset($_POST['pass'])) {
        $passno=$_POST['pass'];
    }
    if (isset($_POST['dateofissue'])) {
        $doi=$_POST['dateofissue'];
    }
    if (isset($_POST['dateofexpiry'])) {
        $doe=$_POST['dateofexpiry'];
    }
    if (isset($_POST['issueplace'])) {
        $poi=$_POST['issueplace'];
    }
    if (isset($_POST['issueplace'])) {
        $poi=$_POST['issueplace'];
    }
    if (isset($_POST['content'])) {
        $empid=$_POST['content'];
    }
    if (isset($_POST['name'])) {
        $emp_name=$_POST['name'];
    }
    if (isset($_POST['designation'])) {
        $desg=$_POST['desgination'];
    }
    if (isset($_POST['companyaddress'])) {
        $comp_add=$_POST['companyaddress'];
    }
    if (isset($_POST['dateofbirth'])) {
        $dob=$_POST['dateofbirth'];
    }
    if (isset($_POST['image'])) {
        $img=$_POST['image'];
    }



    $sql = "SELECT * from upload WHERE EMP_ID='".$empid."'";
    $result = mysqli_query($conn,$sql) ;
    while($row = mysqli_fetch_array($result)){
       $img= '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
       $passno=$row['passport_no'];
       $doi=$row['dateofissue'];
       $doe=$row['dateofexpiry'];
       $poi=$row['placeofissue'];
       $empid=$row['EMP_ID'];
       $emp_name=$row['employee_name'];
       $desg=$row['designation'];
       $comp_add=$row['company_address'];
       $dob=$row['dateofbirth'];
    }
?>    
<!DOCTYPE html>
<html>
    <head>


        <body>
            <form method="POST" action="" >
                <table>
                    <tr><td>Enter Employee Id</td> <td><input type="text" name="content"   id="content"></td></tr>
                    <tr><td><input type="submit" class="FormSubmit"></td></tr>
                    <tr><td>Employee Name</td> <td>        <?php echo $emp_name; ?> </td></tr>
                    <tr><td>Employee desgination</td> <td> <?php echo $desg; ?> </td></tr>
                    <tr><td>Company Address</td> <td>      <?php echo $comp_add; ?> </td></tr>
                    <tr><td>DOB.</td> <td>                 <?php echo $dob; ?> </td></tr>
                    <tr><td>Date of Issue</td> <td>        <?php echo $doi; ?> </td></tr>
                    <tr><td>Date of Expiry</td> <td>       <?php echo $doe; ?> </td></tr>
                    <tr><td>Place of Issue</td> <td>       <?php echo $poi; ?> </td></tr>
                    <tr><td>Passport Image</td> <td>       <?php echo $img; ?> </td></tr>
                    <div class="space"></div>
                    <div id="flash"></div>
                    <div id="show"></div>
                    </div>
                </table>
            </form>    
        </body>
    </head>    
</html>