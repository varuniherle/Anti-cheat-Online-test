<?php include "database.php"; ?>
<?php session_start();  ?> 

<?php 
if (isset($_POST['submit'])){
   //Get Post variables
   
   $question_number = $_POST['question_number'];      
   $question_text = $_POST['question_text'];
   $correct_choice = $_POST['correct_choice'];
   $choices = array();
   $choices[1] = $_POST['choice1'];
   $choices[2] = $_POST['choice2'];
   $choices[3] = $_POST['choice3'];
   $choices[4] = $_POST['choice4'];
   $choices[5] = $_POST['choice5'];
   $q1 = "select exam_id from exam_name where name = '{$_SESSION['exam1']}'";
   $result = $mysqli->query($q1);
   $followingdata = $result->fetch_assoc();
   $id = $followingdata['exam_id'];

   //Question query
   $query="insert into questions (question_number, question,exam_id) 
   	 values('$question_number','$question_text','$id')";
   $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);

   //VALIDATE INSERT
   if($insert_row){
      foreach($choices as $choice => $value){
        if($value != ''){
	       if($correct_choice == $choice){
	          $is_correct = 1;
	       } else {
	         $is_correct = 0;
	       }
              $query="insert into choices (question_number,is_correct,choice) 
   	          values('$question_number','$is_correct','$value')";
              $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);
	          if($insert_row){
	            continue;
	          }else {
	      		die("Error: (".$mysqli->errno.") ".$mysqli->eerror);
	    	}
        }
    }
   $msg="Question has been added";
}
}
//get total questions
$query = "select max(question_number) as max_no from questions";
$questions = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$result = $questions->fetch_assoc();
$next = $result['max_no']+1;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>ADD QUIZ</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>ADD QUESTIONS</h1>
	</div>
      </header>


      <main>
	<div class="container">
	     <h2>Add A question</h2>
	     <?php 
	     	   if(isset($msg)) {
	     	      echo "<p>".$msg."</p>";
	     }
	     ?>
	     <form method="post" action="add.php">
	     	   <p>
			<label>Question Number</label>
			<input type="number" value="<?php echo $next; ?>" name="question_number" />
			<button class = "btn"style: margin-left = 20%><a href = "admin_dashboard.php">Home Page</a></button>
		   </p>
	     	   <p>
			<label>Question</label>
			<input type="text" name="question_text" />
		   </p>
	     	   <p>
			<label>Choice #1: </label>
			<input type="text" name="choice1" />
		   </p>
	     	   <p>
			<label>Choice #2: </label>
			<input type="text" name="choice2" />
		   </p>
	     	   <p>
			<label>Choice #3: </label>
			<input type="text" name="choice3" />
		   </p>
	     	   <p>
			<label>Choice #4: </label>
			<input type="text" name="choice4" />
		   </p>
	     	   <p>
			<label>Choice #5: </label>
			<input type="text" name="choice5" />
		   </p>
	     	   <p>
			<label>Correct choice number </label>
			<input type="number" name="correct_choice" />
		   </p>
		   <p>
			<input type="submit" name="submit" value="Submit" class= "btn"/>
		   </p>
	     </form>
	</div>
      </main>


    
  </body>
</html>