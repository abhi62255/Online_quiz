<?php
	include 'database.php';
	database();	
		$_SESSION['total_marks']=0;
		$_SESSION['correct_question']=0;
		$_SESSION['attempted_question']=0;
		$_SESSION['wrong_question']=0;
	$_SESSION['question']=1;
	echo $_SESSION['test_id'];
	$_SESSION['value']=0;
	$test_id=$_SESSION['test_id'];
	$r=mysql_query("select * from test_details where test_id=$test_id");
	while($row=mysql_fetch_array($r))
	{
		echo "Subject :".$row['subject']." <br />";
		echo "Marks Per Question :".$row['marks_per_q']." <br />";
		echo "Negative Marking Per Question :".$row['negative_marks']." <br />";
		echo "Time :".$row['time']." <br /><br />";
		$_SESSION['negative_marks']=$row['negative_marks'];
		$_SESSION['marks_per_q']=$row['marks_per_q'];
		echo "<a href='check.php'>Take Test</a>";
		echo "<a href=login.php> Exit</a>";
	}
?>