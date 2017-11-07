<html>
<head>
<title>login</title>

</head>
<body>
	<form action="" method="post">
		<input type="text" name="username" placeholder="Username" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit"  name="submit" value="submit" />
	</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	include 'database.php';
	database();
	$username=$_POST['username'];
	$password=$_POST['password'];
	$r=mysql_query("select * from login_details where username='$username' && password='$password'");
	if(mysql_num_rows($r)==1){
		$row=mysql_fetch_array($r);
		$test_id=$row['test_id'];
		$r1=mysql_query("select * from result where student_name='$username' && test_id=$test_id");
		if(mysql_num_rows($r1)==1){
			$result=mysql_query("select * from result where student_name='$username'");
		if(mysql_num_rows($result)>0){
		echo "<table border='1'>";
		echo"<tr><th>Test Id</th><th>Student Name</th><th>Total Question</th><th>Attempted Question</th><th>Correct Question</th><th>Wrong Question</th><th>TOTAL MARKS</th></tr>";
		while($row=mysql_fetch_array($result)){
			echo "<tr><td>".$row['test_id']."</td><td>".$row['student_name']."</td><td>".$row['total_question']."</td><td>".$row['attempted_question']."</td><td>".$row['correct_question']."</td><td>".$row['wrong_question']."</td><td>".$row['total_marks']."</td></tr>";
		}
		echo "</table>";
		}
			echo "<h2>Your Result is Already been Submit</h2>";
		}
		else{
			$_SESSION['test_id']=$test_id;
			$_SESSION['username']=$row['username'];
			echo $_SESSION['test_id'];
			header('Location: test.php');
		}
	}
	else 
		echo "Your Login Credenial Are Wrong";
		
}
?>
