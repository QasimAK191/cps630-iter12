<?php
extract($_POST);
include("connect.php");
$sql=$conn->query("SELECT * FROM users where email='$email'");
if (mysqli_num_rows($sql)>0){ 
    
    echo "<script>confirm('Account already exists under that email!');</script>";
    echo "<a href=\"../signup.php\">Click here to login</a>";
    exit;
}
else if(isset($_POST['save'])){
        $query="INSERT INTO users(name, email, pass, phone, address) VALUES('" . $name . "','" . $email . "','"  . $pass  ."','". $phone ."','" . $address ."')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: ../signup.php?status=success");
        }
    
?>