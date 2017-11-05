<?php
	include('database.php');
		database();
?>
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
	<form method="post" action="">
		<input type="number" placeholder="Test Id" name="search" required/>
		<input type="submit" name="submit_test_id" value="Search" />
	</form>
	<form method="post" action="">
		<input type="text" placeholder="Username" name="search" required/>
		<input type="submit" name="submit_username" value="Search" />
	</form>
	
</body>
</html>
<?php
	if(isset($_POST['submit_test_id'])){
		//echo 'test_id';
		$test_id=$_POST['search'];
		$result=mysql_query("select * from result where test_id=$test_id");
		if(mysql_num_rows($result)>0){
		echo "<table border='1'>";
		echo"<tr><th>Test Id</th><th>Student Name</th><th>Total Question</th><th>Attempted Question</th><th>Correct Question</th><th>Wrong Question</th><th>TOTAL MARKS</th></tr>";
		while($row=mysql_fetch_array($result)){
			echo "<tr><td>".$row['test_id']."</td><td>".$row['student_name']."</td><td>".$row['total_question']."</td><td>".$row['attempted_question']."</td><td>".$row['correct_question']."</td><td>".$row['wrong_question']."</td><td>".$row['total_marks']."</td></tr>";
		}
		echo "</table>";
		}
		else
			echo "No Test result available";
	}
	if(isset($_POST['submit_username'])){
		//echo 'username';
		$username=$_POST['search'];
		$result=mysql_query("select * from result where student_name='$username'");
		if(mysql_num_rows($result)>0){
		echo "<table border='1'>";
		echo"<tr><th>Test Id</th><th>Student Name</th><th>Total Question</th><th>Attempted Question</th><th>Correct Question</th><th>Wrong Question</th><th>TOTAL MARKS</th></tr>";
		while($row=mysql_fetch_array($result)){
			echo "<tr><td>".$row['test_id']."</td><td>".$row['student_name']."</td><td>".$row['total_question']."</td><td>".$row['attempted_question']."</td><td>".$row['correct_question']."</td><td>".$row['wrong_question']."</td><td>".$row['total_marks']."</td></tr>";
		}
		echo "</table>";
		}
		else
			echo "No Test result available";
		
	}
?>