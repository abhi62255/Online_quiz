<?php
	include('database.php');
	database();
		if($_SESSION['value']==1)
			echo "<h2>Your Time For Examination Is Up</h2>";
		if(!isset($ques)){
			$ques=$_SESSION['Total_question'];
		}
		echo "Total Marks :" .$_SESSION['total_marks']."<br />";
		echo "Correct_question :" .$_SESSION['correct_question']."<br />";
		echo "Attempted Question :" .$_SESSION['attempted_question']."<br />";
		echo "Wrong Question :" .$_SESSION['wrong_question']."<br />";
		echo "Total Question :" .$ques;

		$username=$_SESSION['username'];
		$marks=$ques*$_SESSION['marks_per_q'];
		$test_id=$_SESSION['test_id'];
		$question=$_SESSION['question'];
		$attempted_question=$_SESSION['attempted_question'];
		$correct_question=$_SESSION['correct_question'];
		$wrong_question=$_SESSION['wrong_question'];
		$total_marks=$_SESSION['total_marks'];
		$result=mysql_query("insert into result values ($test_id,'$username',$ques,$attempted_question,$correct_question,$wrong_question,$marks,$total_marks)");
		if('$result')
			echo "<br /><h2>Your Test is Complted and Submitted</h2>";
	
		
			
		echo "<a href=login.php> Exit</a>";




?>