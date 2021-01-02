<?php session_start();?>

<?php
include 'database.php';

 $examid = $_POST['exam_id'];
 $Q = "select * from marks where username = '{$_SESSION['user_name']}' and exam_id = '$examid' ";
 $E = $mysqli->query($Q);
 $a = $E->num_rows;
//  if($E)
//  {
//      echo "<script>alert('fj')</script>";
//  }
//  else{
//     echo "<script>alert('jnesfjkd')</script>";
//  }
//echo "<script>alert($a)</script>";

 if($E->num_rows == 1)
 {
     header("Location:exam_taken.html");
 }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Practice</title>
    <script src="js/auth.js"></script>
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/quiz.css">
</head>
<body>
    <h1 class = "main">Hidden Answers</h1><br>

<div class = "container">
<form method="post" action="scorecard.php">
<?php 


$query="select * from questions where exam_id = $examid";
$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
// $total = $results->num_rows ;
// $_SESSION['score'] = 0;
// $score = 0;
$a = 0;

if($results->num_rows >0)
{
while($r1 = $results->fetch_assoc())
    {
        $number = $r1['question_number'];
        $q2 = "select * from choices where question_number = $number";
        $r2 = $mysqli->query($q2) or die($mysqli->error.__LINE__);
        $a = $a+1
    ?>
    <p oncopy = "copy()"><b>
	   <?php echo "Q".$a."."." ".$r1['question'] ?>
	</p></b>

        <?php 
        
        while($row = $r2->fetch_assoc())
        {
        ?>
        <input type="radio" name="quizcheck[<?php echo $row['question_number']; ?>]" value="<?php echo $row['id'];?>" required><?php echo "  ". $row['choice'];?><br>
        <?php
        }
        ?>
	     <br><hr>
        <?php 
          ?>  
          
          
	

<?php 
    }
}
?>
 
<input type="hidden" name="eid" value="<?php echo $examid; ?>" />
<input type="submit" value="submit"  class = "btn btn-primary"/>
</form>
<br>
</div>

</body>
</html>
