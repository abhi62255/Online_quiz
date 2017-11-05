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
			echo "your result is already is been submit";
		}
		else{
			$_SESSION['test_id']=$row['test_id'];
			$_SESSION['username']=$row['username'];
			header('Location: test.php');
		}
	}
	else 
		echo "Your Login Credenial Are Wrong";
		
}
?>
