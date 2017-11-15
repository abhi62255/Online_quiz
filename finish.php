<?php
	include('database.php');
			if($_SESSION['value']==1)
			echo "<h2>Your Time For Examination Is Up</h2>";
		if(!isset($ques)){
			$ques=$_SESSION['Total_question'];
		}
echo '<div style=" background-color:#CCCCCC; height:300px; width:500px; margin-top:150px; margin-left:400px; border:#999999; border:thin; padding-top:67px;" align="center">';
	echo '<table border="0" cellpadding="10px">';
		echo "<tr><th>Total Marks :</th><td>" .$_SESSION['total_marks']."</td></tr>";
		echo "<tr><th>Correct Question :</th><td>" .$_SESSION['correct_question']."</td></tr>";
		echo "<tr><th>Attempted Question :</th><td>" .$_SESSION['attempted_question']."</td></tr>";
		echo "<tr><th>Wrong Question :</th><td>" .$_SESSION['wrong_question']."</td></tr>";
		echo "<tr><th>Total Question :</th><td>" .$ques."</td></tr>";

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
			echo "<tr><th colspan='2'><h2>Your Test is Complted and Submitted</h2></th></tr>";
	
		
			
		echo"<tr><th colspan='2' align='center' width='700px'><button style='height:25px; width:100px; font-weight:bold; background-color:#0099FF; color:#FFFFFF;' width='700px'><a href='login.php' style='text-decoration:none; color:#FF0000;'>EXIT</a></button></th></tr> ";
echo "</table></div>";



?>