
<?php include 'database.php'; ?>
<?php session_start() ?>

<?php
$quiz = $_POST["quizcheck"];
$eid = $_POST["eid"];
//print_r($quiz);

//selecting the exam_name
$Q = "select name as nm from exam_name where exam_id = $eid";
$E = $mysqli->query($Q);
$R = $E->fetch_assoc();
$exam_name = $R['nm'];

$score = 0;
$q= "select * from questions where exam_id = $eid";
$r = $mysqli->query($q);
$total_score = $r->num_rows;
foreach($quiz as $key=>$value)
{
    //echo $key." ".$value."<br>";
    $query = "select id from choices where question_number = $key && is_correct = 1";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    if ($result->num_rows==1)
    {
        $row = $result->fetch_assoc();
        if($row['id']==$value)
        {
            $score = $score+1;
        }
        
}
}
$accuracy = ($score/$total_score)*100;
$q1 = "insert into marks (username,exam_id,marks) values('{$_SESSION['user_name']}','$eid',$accuracy)";
$e1 = $mysqli->query($q1);
if($e1)
{
    #echo "<script>alert('excuted')</script>";
}
else{
    echo "<script>alert('There was problem in executing')</script>";
}



if ($accuracy >=50)
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<center>
<div id="printableArea">
<div style="width:700px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:650px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
       <br><br>
       <span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:30px"><b><?php echo $_SESSION['name']; ?></b></span><br/><br/>
       <span style="font-size:25px"><i>has cleared <?php echo $exam_name; ?> skill test </i></span> <br/><br/>
       <span style="font-size:20px">with score of <b><?php echo $accuracy ?></b></span> <br/><br/><br/><br/>
       <span style="font-size:25px"><i>dated</i></span><br>     
       <span style="font-size:30px"><?php echo  date("Y/m/d") ?></span>
</div>
</div>
</div><br>
<center>
<input type="button" onclick="printDiv('printableArea')" value="print certificate" class = "btn btn-primary" />
<?php
}
else{
    echo "<b>Sorry,<br> Better luck next time</b>";
}
?>

<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<p><a href = "index.php"><b>GO BACK</b></p>
</body>
</html>