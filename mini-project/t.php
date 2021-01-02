<?php
include 'database.php';
$query = "select max(question_number) as max_no from questions";
$questions = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$result = $questions->fetch_assoc();
echo $result['max_no']+1;
?>