<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hidden Answers - Admin Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="content">
    <h1 class="main" style="text-align: center;">Hidden Answers</h1>
  </div>

  <nav class="navbar navbar-expand-sm  navbar-light sticky-top" style="background-color: #e3f2fd;">


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="features.html">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="skills.php">Skill Certification</a>
        </li>
        <li class="nav-item">
          <a href="register.php" class="nav-link">Register</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="wrapper" id='demo1'>
    <div class="container mt-4">
      <form action="" class="form-signin" method="post">
        <h3 class="form-heading text-center" >
         <p style=" color: darkslateblue;"> Admin Login Form </p>
        </h3>
        <input  class="form-control" name="user" placeholder="Email Address" required="" autofocus="" />

        <input type="password" class="form-control" name="pass" placeholder="Password" required="" autofocus="" />

        <label class="checkbox" for="">
          <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">
          Remember Me
        </label>
        <input type="submit" name="submit" class="btn btn-lg btn-dark btn-block">
        <!-- <button >
          Login
        </button> -->
      </form>
    </div>
  </div>



</body>

</html>
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
