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
<div class="content">
        <h1 class="main" style="text-align: center;">Hidden Answers Admin</h1>
    </div>
    <nav class="navbar navbar-expand-sm  navbar-light sticky-top" style="background-color: #e3f2fd;">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.php">Admin dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_exam.php">Add Exam</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="delete_exam.php">Delete Exam</a>
                </li>

            </ul>
        </div>
    </nav>

<div class="content">
  
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
