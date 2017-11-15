<html>
<head>
<title>login</title>

</head>
<body>
<div style="background-color:#CCCCCC; height:305px; width:500px; margin-top:150px; margin-left:400px; border:#999999; border:thin; padding-top:100px;" align="center">
	<span><h3 style=" margin-bottom: 65px; margin-top: -60px; margin-left: -200px;">Baddi University Captive Portal</h3></span>
	<span><img src="image/uploadedwebclientlogo.png" style="width:200px;margin-left: 291px;margin-top: -93px;"></span>
	<span style=" font-weight:bold;">Test Log In</span>
	<form action="" method="post">
		<table border="0" cellspacing="20px">
			<tr><th><input type="text" name="username" placeholder="Username" style="padding:10px; padding-right:100px;" required/></th></tr>
			<tr><th><input type="password" name="password" placeholder="Password" style="padding:10px; padding-right:100px;"required/></th></tr>
			<tr><th><input type="submit"  name="submit" value="LOG IN" style="height:25px; width:100px; font-weight:bold; background-color:#0099FF; color:#FFFFFF;"/></th></tr>
		</table>
	</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	include 'database.php';
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
		echo"<tr><th>Student Name</th><th>Total Question</th><th>Attempted Question</th><th>Correct Question</th><th>Wrong Question</th><th>TOTAL MARKS</th><th>Marks Obtain</th></tr>";
		while($row=mysql_fetch_array($result)){
			echo "<tr><td>".$row['student_name']."</td><td>".$row['total_question']."</td><td>".$row['attempted_question']."</td><td>".$row['correct_question']."</td><td>".$row['wrong_question']."</td><td>".$row['total_marks']."</td><td>".$row['marks_obtained']."</td></tr>";
		}
		echo "</table>";
		}
			echo "<h2 style='color:#009966;'>Your Result is Already Submitted</h2>";
		}
		else{
			$_SESSION['test_id']=$test_id;
			$_SESSION['username']=$row['username'];
			echo $_SESSION['test_id'];
			header('Location: test.php');
		}
	}
	else 
		echo "<span style='color:#00CC66; font-weight:bold;'>STATUS : </span><span  style='color:#FF0000; font-weight:bold;'>Your Login Credenial Are Wrong</span></div>";
		
}
?>
