<?php
	include('database.php');
	database();
		if(!isset($question)){
			$question=$_SESSION['question']-1;
		}
		echo "Total Marks".$_SESSION['total_marks']."<br />";
		echo "Correct_question".$_SESSION['correct_question']."<br />";
		echo "Attempted Question".$_SESSION['attempted_question']."<br />";
		echo "Wrong Question".$_SESSION['wrong_question']."<br />";
		echo "Total Question".$question;
		echo $_SESSION['test_id'];
		echo $_SESSION['username'];
		
		$username=$_SESSION['username'];
		$test_id=$_SESSION['test_id'];
		$question=$_SESSION['question'];
		$attempted_question=$_SESSION['attempted_question'];
		$correct_question=$_SESSION['correct_question'];
		$wrong_question=$_SESSION['question'];
		$total_marks=$_SESSION['total_marks'];
		$result=mysql_query("insert into result values ($test_id,'$username',$question,$attempted_question,$correct_question,$wrong_question,$total_marks)");
		if('$result')
			echo "<br />your test is complted and submitted";
			
		echo "<a href=login.php> Exit</a>";




?>