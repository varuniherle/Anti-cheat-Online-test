<?php
include 'database.php';

if(isset($_POST['submit'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
$name = $_POST['name'];

$q1 = "select * from student where email = '$user'";
$e1 = $mysqli->query($q1);
if($e1->num_rows==0)
{
    $q2 = "insert into student(email,pass,name) values('$user','$pass','$name');";
    $e2 = $mysqli->query($q2);
    if($e2)
    {
        echo "<script>alert('Registered Sucessfully')</script>";
        header("Location:index.php");
    }
    else
    {
        echo "<script>alert('There was a problem while creating please try after some time');</script>";
    }

}
else{
    echo "<script>alert('User already exists')</script>";
}
}

?>
<html>
<head>
<title>Registeration</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/admin_login.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
</head>
<body>
<h1 class = "main">Hidden Answers</h1>
<div class="flex-container">
  <div class="content-container">
    <div class="form-container">
      <form action="" method = "post">
        <h6>
          Registration.
        </h6>
       
    
        <span class="subtitle">EMAIL:</span>
        <br>
        <input  name="user" type = "email" required>
        <br>
        <span class="subtitle">PASSWORD:</span>
        <br>
        <input type="password" name="pass" required>
        <br>
        <span class="subtitle">USERNAME:</span>
        <br>
        <input  name="name" required>
        <br>
        <input type="submit" name = "submit" class="submit-btn">
        
      </form>
    </div>
  </div>
</div>