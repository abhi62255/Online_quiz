<?php
	include 'database.php';
	database();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
	<form action=""; method="post">
		Test Id <input type="number" name="test_id" /><br />
		Name <input type="text" name="username" /><br />
		Password <input type="password" name="password" /><br />
		<input type="submit" name="submit" value="Add" /><br />
	</form>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$test_id=$_POST['test_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$r1=mysql_query("select * from login_details where username='$username'");
		if(mysql_num_rows($r1)==0)
		{
			$r=mysql_query("insert into login_details(username,password,test_id) values('$username','$password',$test_id)");	
			echo "Student Added Successfully";
		}
		else
		{
			echo "Details Are incorrect";
		}
	}

?>
