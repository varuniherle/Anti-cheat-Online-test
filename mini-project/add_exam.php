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
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<div class="sidebar">
  <a href="admin_dashboard.php"> Home </a>
  <a href="add_exam.php" class = "active">Add Skill Test</a>
  <a href="delete_exam.php">Delete Exam</a>
  
</div>

<div class="content">

  <h1 class = "main">Hidden Answers</h1>
  <br><br>
  <div class = "exam_form">
  <form method = "post" action = "" class="form-signin">
  <div class="form-group">
    <label >Exam name</label>
    <input type="text" class="form-control" placeholder="Enter Exam name" name = "exam">
  </div> 
  <div class="form-group">
    
    <input type="submit" class="btn btn-lg btn-dark btn-block" name = "submit1">
  </div> 
  </form> 
  </div> <!-- exam_form-->

</div><!-- content-->
<?php include 'database.php'; ?>
<? session_start();?>
<?php 
    include 'database.php';
    if(isset($_POST['submit1']))
    {  
        $exam = $_POST['exam'];
        $_SESSION['exam1'] =$exam;
        $query="insert into exam_name (name) values('$exam')";
        $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);
   
   
   if($insert_row){
     
    
       header("Location:add.php");
   }
   else{
       echo "<script>alert('Exam Already exist');</script>";
   }
    }
?>
</body>
</html>
