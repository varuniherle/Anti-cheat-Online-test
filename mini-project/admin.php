<html>
<head>
<title>Admin Login</title>
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
        <h1>
          Admin Login
        </h1>
        <br>
        <br>
        <span class="subtitle">USERNAME:</span>
        <br>
        <input  name="user">
        <br>
        <span class="subtitle">PASSWORD:</span>
        <br>
        <input type="password" name="pass">
        <br><br>
        <input type="submit" name = "submit" class="submit-btn">
      </form>
    </div>
  </div>
</div>
<?php session_start(); ?>
<?php
include 'database.php';
if(isset($_POST['submit']))
{
    $user = $_POST['user'];
    $password = $_POST['pass'];
    $_SESSION['user'] = $user;
    $q = "select name from admin where user = '$user' and password = '$password';";
    $result =$mysqli->query($q)  or die($mysqli->error.__LINE__);
    
    if($result->num_rows ==1)
    {
        header("Location: admin_dashboard.php");
    }
else{
    echo "<script>alert('Incorrect username or password');</script>";
}


}    
?>
</body>

</html>