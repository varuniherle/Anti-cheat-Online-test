<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

      //Check to see if score is set_error_handler
	if (!isset($_SESSION['score'])){
	   $_SESSION['score'] = 0;
	}

//Check if form was submitted
if($_POST){
	$number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $examid = $_POST['eid'];
	

	//Get total number of questions
	$query= "SELECT * FROM questions where exam_id = $examid";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total=$results->num_rows;

	//Get correct choice
	$q = "select * from choices where question_number = $number &&  is_correct=1";
	$result = $mysqli->query($q) or die($mysqli->error.__LINE__);
	$row = $result->fetch_assoc();
	$correct_choice=$row['id'];



	//compare answer with result
	if($correct_choice == $selected_choice){
		$_SESSION['score']++;
	}

	if($number == $total){
		header("Location: final.php");
		exit();
	} else {
	        header("Location: trial1.php?exam_id = ".$examid);
	}
}
?>