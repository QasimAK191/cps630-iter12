<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'connect.php';
    $sql=$conn->query("SELECT * FROM users where email='$email' and pass='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION['loggedIn'] = true;  
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["pass"] = $row['pass'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["name"]=$row['name'];
        $_SESSION["address"]=$row['address']; 
        header("Location: ../index.html"); 
        exit();
    }
    else
    {
        echo "<script>confirm('Invalid Email ID/Password');</script>";
        echo "<a href=\"../signup.php\" class=\"button\">Go back to Login Page</a>";
    }
}
?>