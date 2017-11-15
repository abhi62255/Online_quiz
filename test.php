
<?php
	include 'database.php';
		$_SESSION['total_marks']=0;
		$_SESSION['correct_question']=0;
		$_SESSION['attempted_question']=0;
		$_SESSION['wrong_question']=0;
		$_SESSION['question']=1;
		unset($_SESSION['time_g']);
	$_SESSION['value']=0;
	$test_id=$_SESSION['test_id'];
	$r=mysql_query("select * from test_details where test_id=$test_id");
	$r1=mysql_query("select * from question where test_id=$test_id");
	$_SESSION['Total_question']=mysql_num_rows($r1);
?>
<div style=" background-color:#CCCCCC; height:350px; width:500px; margin-top:150px; margin-left:400px; border:#999999; border:thin; padding-top:67px;" align="center">
	<table border="0" cellpadding="10px">
<?php
	echo "<tr><th>Test Id :</th><td>".$_SESSION['test_id']."</td></tr>";
	while($row=mysql_fetch_array($r))
	{
		echo "<tr><th>Subject :</th><td>".$row['subject']." </td></tr>";
		echo "<tr><th>Marks Per Question :</th><td>".$row['marks_per_q']."</td></tr>";
		echo "<tr><th>Negative Marking Per Question :</th><td>".$row['negative_marks']."</td></tr>";
		echo "<tr><th>Time :</th><td>".$row['time']." hr</td></tr>";
		$_SESSION['time']=$row['time'];
		$_SESSION['negative_marks']=$row['negative_marks'];
		$_SESSION['marks_per_q']=$row['marks_per_q'];
		echo "<tr><th colspan='2'><a href='check.php' style='text-decoration:none; color:#FF0000; font-weight:bold;'>Take Test</a></th></tr>";
		echo "<tr><th colspan='2'><a href='login.php' style='text-decoration:none; color:#FF0000; font-weight:bold;'> Exit</a></th></tr>";
	}
	echo "</table></div>";
?>