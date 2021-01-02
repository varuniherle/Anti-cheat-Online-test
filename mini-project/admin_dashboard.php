<?php
session_start();
#echo $_SESSION['user'];
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
</head>
<body>
<div class="sidebar">
  <a class="active" href="admin_dashboard.php"> Home </a>
  <a href="add_exam.php">Add Skill Test</a>
  <a href="delete_exam.php">Delete Exam</a>
  
</div>

<div class="content">
  <h1 class = "main">Hidden Answers</h1>
  <br><br>
  
</div>

</body>
</html>