<?php session_start()?>
<?php
include 'database.php';

if(isset($_POST['submit'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$_SESSION['name'] = $name;
$_SESSION['user_name'] = $user;

$q1 = "select * from student where email = '$user' and pass = '$pass'";
$e1 = $mysqli->query($q1);
if($e1->num_rows==1)
{
   header("Location:exam_selection.php");
}
else{
    echo "<script>alert('Incorrect username or password')</script>";
}
}

?>
<html>
<head>
<title>LOGIN</title>
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
          Kindly Enter the details.
        </h6>
       
    
        <span class="subtitle">EMAIL:</span>
        <br>
        <input  name="user" type = "email" required>
        <br>
        <span class="subtitle">PASSWORD:</span>
        <br>
        <input type="password" name="pass" required>
        <br>
        <span class="subtitle">NAME:</span>
        <br>
        <input  name="name" required>
        <br>
        <input type="submit" name = "submit" class="submit-btn">
        
      </form>
    </div>
  </div>
</div>>