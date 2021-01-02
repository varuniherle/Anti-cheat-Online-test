<?php 
include 'database.php';
if (isset($_POST['submit']))
{
$id = $_POST['id'];

#selecting the question numbers
$q2 = "select * from questions  where exam_id = $id ";
$e2 = $mysqli->query($q2) or die($mysqli->error.__LINE__);
while($r2 =  $e2->fetch_assoc()) 
{
    $q_id = $r2['question_number'];
    $q3 = "delete from choices where question_number = $q_id ";
    $e3 = $mysqli->query($q3);
}

$q4 = "delete from questions where exam_id = $id ";
$e4 = $mysqli->query($q4) or die($mysqli->error.__LINE__);

$e5 = $mysqli->query("delete from exam_name where exam_id = $id");
if($e4 && $e2 && $e5){
echo "<script>alert('Deleted')</script>";
}
else{
    echo "<script>alert('couldnt delete')</script>";
}

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/admin_login.css">
</head>
<body>
<div class="sidebar">
  <a href="admin_dashboard.php"> Home </a>
  <a href="add_exam.php">Add Skill Test</a>
  <a href="delete_exam.php" class = "active">Delete Exam</a>
  
</div>

<div class="content">
  <h1 class = "main">Hidden Answers</h1>
  <br><br>
  <div  class = "exam_form">
  <form method = "post" action = "">
  <label><h5>Select The Exam thatyou wish to delete</h5></label><br>  
		<select name="id" style="width: 250px;  border: 3px double #CCCCCC; " class="form-control" required />
			<?php
				include('database.php');
                $q4 = "select * from exam_name";
                $ex = $mysqli->query($q4);
						
				while($row = $ex->fetch_assoc())
							{
								echo '<option value="'.$row['exam_id'].'">';
								echo $row['name'];
								echo '</option>';
							}
			?>
				
        </select><br>
    <input type = "submit" name = "submit" class = "submit-btn ">
    </form>
    <div>
</div>

</body>
</html>