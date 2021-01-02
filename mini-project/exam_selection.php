
<!DOCTYPE html>
<html>
<head>
    <title> exam selection</title>
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/selection.css"><meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<h1 class = "main">Hidden Answers</h1>

<br><br>

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-8">
          <h3>Instructions</h3>
      <h4>PROCTORING INFO</h4>
      <h6>Full screen mode</h6>
      <p>This test is enabled for Fullscreen mode. Fullscreen mode will be activated once you are on the test page. Any attempts to exit the fullscreen will lead to negative impression.</p>
      <h6>Tab Track</h6>
      <p>This test is enabled for tab tracking. Any attempts of switching the tabs will lead to negative impression</p>
      <h6>Plagiarism Check</h6>
      <p>Any attempts of copying the solution will lead to disqualification</p>
  </div>
      
      <div class="col-sm-9 col-md-4">
          <br>
      
          
<form method = "post" action = "exam_question.php">

<h6>Choose your TEST</h6>
    <?php
    include 'database.php';

    $q1 = "select *from exam_name";
    $r1 = $mysqli->query($q1);
    
    if ($r1->num_rows >0){ 
        while($row = $r1->fetch_assoc())
        {
    ?>
    
    <input type="radio" name="exam_id" value="<?php echo $row['exam_id'];?> " required  > <?php echo $row['name'];?><br>

    <?php
    } 
}
?>
<br>
<input type = "submit" class = "btn btn-primary">
<form>


      </div>
    </div>
  </div>

</body>
</html>